<?php

namespace App\Models;

use CodeIgniter\Model;

class UsuariosModel extends Model
{
    protected $table = 'usuarios';
    protected $primaryKey = 'id';
    protected $allowedFields = ['nombre_usuario', 'correo_electronico', 'contrasena', 'tipo_usuario', 'activo', 'codigo_verificacion', 'edad', 'fecha_nacimiento', 'direccion', 'sexo', 'imagen_usuario'];

    public function obtenerUsuarioPorNombreUsuario($nombreUsuario)
    {
        return $this->where('nombre_usuario', $nombreUsuario)->first();
    }
}
