<?php

namespace App\Controllers;

use App\Models\ProductosModel;
use TCPDF;

class Productos extends BaseController
{
    public function index()
    {
        $model = new ProductosModel();
        $data['productos'] = $model->where('Estado', 1)->findAll();
        $data['productos_deshabilitados'] = $model->where('Estado', 0)->findAll();
        $data['title'] = 'Inicio';
        return view('productos/data', $data);
    }

    public function create()
    {
        $data['title'] = 'Insertar';
        return view('productos/create', $data);
    }

    public function store()
    {
        $model = new ProductosModel();
        $data = [
            'Nombre' => $this->request->getVar('Nombre'),
            'Precio'  => $this->request->getVar('Precio'),
            'Cantidad' => $this->request->getVar('Cantidad'),
            'Estado' => 1, // Establece el estado como activo (1)
        ];
        $model->insert($data);
        return redirect()->to(base_url());
    }

    public function edit($id = null)
    {
        $model = new ProductosModel();
        $data['producto'] = $model->find($id);
        $data['title'] = 'Editar';
        return view('productos/edit', $data);
    }

    public function update($id = null)
    {
        $model = new ProductosModel();
        $data = [
            'Nombre' => $this->request->getVar('Nombre'),
            'Precio'  => $this->request->getVar('Precio'),
            'Cantidad' => $this->request->getVar('Cantidad'),
        ];
        $model->update($id, $data);
        return redirect()->to(base_url());
    }

    public function disable($id = null)
    {
        $model = new ProductosModel();
        $data = [
            'Estado' => 0, // Establece el estado como deshabilitado (0)
        ];
        $model->update($id, $data);
        return redirect()->to(base_url());
    }

    public function enable($id = null)
    {
        $model = new ProductosModel();
        $data = [
            'Estado' => 1, // Establece el estado como activo (1)
        ];
        $model->update($id, $data);
        return redirect()->to(base_url());
    }

    public function delete($id = null)
    {
        $model = new ProductosModel();
        $model->delete($id);
        return redirect()->to(base_url());
    }

    public function logout()
    {
        session()->remove('usuario');
        return redirect()->to(base_url('usuarios/login'));
    }

    public function generarReporteProductos()
    {
        // Carga la biblioteca TCPDF
        require_once(APPPATH . 'ThirdParty/tcpdf/tcpdf.php');


        // Crea una nueva instancia de la clase TCPDF
        $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT);
        // Establece los márgenes del documento
        $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);

        // Establece el encabezado y el pie de página del documento
        $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
        $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

        // Establece el tipo de fuente predeterminado
        $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

        // Establece los márgenes del encabezado y el pie de página
        $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
        $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

        // Establece las divisiones automáticas de página
        $pdf->SetAutoPageBreak(true, PDF_MARGIN_BOTTOM);

        // Establece la escala de imagen
        $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

        // Establece la fuente
        $pdf->SetFont('dejavusans', '', 10);

        // Agrega una nueva página al documento
        $pdf->AddPage();

        // Obtiene los datos de los productos
        $model = new ProductosModel();
        $productos = $model->where('Estado', 1)->findAll();

        // Define el contenido HTML del documento
        $html = '<h1>Reporte de Productos</h1>
    <table border="1" cellspacing="3" cellpadding="4">
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Precio</th>
            <th>Cantidad</th>
        </tr>';
        foreach ($productos as $producto) {
            $html .= '<tr>
            <td>' . $producto['idProducto'] . '</td>
            <td>' . $producto['Nombre'] . '</td>
            <td>' . $producto['Precio'] . '</td>
            <td>' . $producto['Cantidad'] . '</td>
          </tr>';
        }
        $html .= '</table>';

        // Escribe el contenido HTML en el documento
        $pdf->writeHTML($html, true, false, true, false, '');

        // Cierra y envía el documento PDF al navegador del usuario
        $pdf->Output('reporte_productos.pdf', 'I');
    }
}



