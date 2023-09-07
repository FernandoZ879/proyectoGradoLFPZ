<?php

namespace App\Controllers;

use App\Models\ObjetosARModel;

class ObjetosAR extends BaseController
{
    public function index()
    {
        $objetoModel = new ObjetosARModel();

        $data['title'] = 'Lista de objetos';
        $data['objetos'] = $objetoModel->where('estado', 1)->findAll();
        $data['objetos_deshabilitados'] = $objetoModel->where('estado', 0)->findAll();

        return view('objetos/index', $data);
    }


    public function create()
    {
        $data['title'] = 'Insertar';
        return view('objetos/create', $data);
    }

    public function store()
    {
        $model = new ObjetosARModel();
        $data = [
            'nombre' => $this->request->getVar('nombre'),
            'descripcion' => $this->request->getVar('descripcion'),
            'dimensionesXYZ' => $this->request->getVar('dimensionesXYZ'),
            'material' => $this->request->getVar('material'),
            'precio' => $this->request->getVar('precio'),
            'estado' => 1,
        ];
        $fileImagen = $this->request->getFile('imagen');
        $fileModelo3D = $this->request->getFile('modelo3D');

        if ($fileImagen->isValid() && !$fileImagen->hasMoved()) {
            $data['imagen'] = file_get_contents($fileImagen->getTempName());
        }

        if ($fileModelo3D->isValid() && !$fileModelo3D->hasMoved()) {
            $fileModelo3D->move('./modelos', $fileModelo3D->getName());
            $data['nombreArchivoModelo'] = $fileModelo3D->getName();
        }

        $model->insert($data);
        return redirect()->to(base_url('objetos'));
    }

    public function edit($id = null)
    {
        $model = new ObjetosARModel();
        $data['objeto'] = $model->find($id);
        $data['title'] = 'Editar';
        return view('objetos/edit', $data);
    }

    public function update($id = null)
    {
        $model = new ObjetosARModel();
        $data = [
            'nombre' => $this->request->getVar('nombre'),
            'descripcion' => $this->request->getVar('descripcion'),
            'dimensionesXYZ' => $this->request->getVar('dimensionesXYZ'),
            'material' => $this->request->getVar('material'),
            'precio' => $this->request->getVar('precio'),
        ];
        $fileImagen = $this->request->getFile('imagen');
        $fileModelo3D = $this->request->getFile('modelo3D');

        if ($fileImagen->isValid() && !$fileImagen->hasMoved()) {
            $data['imagen'] = file_get_contents($fileImagen->getTempName());
        }

        if ($fileModelo3D->isValid() && !$fileModelo3D->hasMoved()) {

            $fileModelo3D->move('./modelos', $fileModelo3D->getName());
            $data['nombreArchivoModelo'] = $fileModelo3D->getName();
        }

        $model->update($id, $data);
        return redirect()->to(base_url('objetos'));
    }

    public function disable($id = null)
    {
        $model = new ObjetosARModel();
        $data = [
            'estado' => 0,
        ];
        $model->update($id, $data);
        return redirect()->to(base_url('objetos'));
    }

    public function enable($id = null)
    {
        $model = new ObjetosARModel();
        $data = [
            'estado' => 1,
        ];
        $model->update($id, $data);
        return redirect()->to(base_url('objetos'));
    }

    public function delete($id = null)
    {
        $model = new ObjetosARModel();
        $model->delete($id);
        return redirect()->to(base_url('objetos'));
    }
}
