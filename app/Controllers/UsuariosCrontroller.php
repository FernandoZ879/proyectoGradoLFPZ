<?php

namespace App\Controllers;

use App\Models\UsuariosModel;

class UsuariosController extends BaseController
{
    public function index()
    {
        $model = new UsuariosModel();
        
        $data['titulo'] = 'Lista de Usuarios';
        $data['usuarios'] = $model->where('activo', 1)->findAll();
                $data['usuarios_deshabilitados'] = $model->where('activo', 0)->findAll();

        return view('usuarios/data.php', $data);
    }

    public function create()
    {
        $data['titulo'] = 'Crear Usuario';
    
        return view('usuarios/create', $data);
    }

    public function store()
    {
        $model = new UsuariosModel();

        $data = [
            'nombre_usuario' => $this->request->getVar('nombre_usuario'),
            'correo_electronico' => $this->request->getVar('correo_electronico'), 
            'contrasena' => password_hash($this->request->getVar('contrasena'), PASSWORD_DEFAULT),
            'tipo_usuario' => $this->request->getVar('tipo_usuario'),
            'activo' => 1,
            'edad' => $this->request->getVar('edad'), 
            'fecha_nacimiento' => $this->request->getVar('fecha_nacimiento'),
            'direccion' => $this->request->getVar('direccion'),
            'sexo' => $this->request->getVar('sexo')
          ];
        
          $imagen = $this->request->getFile('imagen');
          if($imagen->isValid() && !$imagen->hasMoved()) {
            $data['imagen_usuario'] = file_get_contents($imagen->getTempName()); 
          }
    
        $model->insert($data);

        return redirect()->to(base_url('usuarios'));
    }

    public function edit($id = null) 
    {
        $model = new UsuariosModel();
        $data['usuario'] = $model->find($id);
        $data['titulo'] = 'Editar Usuario';
    
        return view('usuarios/edit', $data);
    }

    public function update($id = null)
    {
        $model = new UsuariosModel();
        
        $data = [
            'nombre_usuario' => $this->request->getVar('nombre_usuario'),
            'correo_electronico' => $this->request->getVar('correo_electronico'),
            'tipo_usuario' => $this->request->getVar('tipo_usuario'),
            'edad' => $this->request->getVar('edad'),
            'fecha_nacimiento' => $this->request->getVar('fecha_nacimiento'), 
            'direccion' => $this->request->getVar('direccion'),
            'sexo' => $this->request->getVar('sexo')
          ];
        
          if($this->request->getFile('imagen')) {
            $imagen = $this->request->getFile('imagen');
            if($imagen->isValid() && !$imagen->hasMoved()) {
              $data['imagen_usuario'] = file_get_contents($imagen->getTempName());
            }
          }
        
        if($this->request->getVar('contrasena')) {
            $data['contrasena'] = password_hash($this->request->getVar('contrasena'), PASSWORD_DEFAULT);
        }

        $model->update($id, $data);

        return redirect()->to(base_url('usuarios'));
    }

    public function delete($id = null)
    {
        $model = new UsuariosModel();
        $model->delete($id);
        return redirect()->to(base_url('usuarios'));
    }

    public function disable($id = null)
    {
        $model = new UsuariosModel();
        
        $data = [
            'activo' => 0
        ];
        
        $model->update($id, $data);

        return redirect()->to(base_url('usuarios'));
    }

    public function enable($id = null)
    {
        $model = new UsuariosModel();
        
        $data = [
            'activo' => 1
        ];
        
        $model->update($id, $data);

        return redirect()->to(base_url('usuarios'));
    }
}
