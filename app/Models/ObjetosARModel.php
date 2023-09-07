<?php

namespace App\Models;

use CodeIgniter\Model;

class ObjetosARModel extends Model
{
    protected $table = 'ObjetosAR';
    protected $primaryKey = 'idObjeto';
    protected $allowedFields = ['nombre', 'descripcion', 'dimensionesXYZ', 'material', 'precio', 'imagen', 'nombreArchivoModelo', 'estado'];
}


