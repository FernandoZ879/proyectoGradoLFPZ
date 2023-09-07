<?php

namespace App\Models;

use CodeIgniter\Model;

class ProductosModel extends Model
{
    protected $table = 'Productos';
    protected $primaryKey = 'idProducto';
    protected $allowedFields = ['Nombre', 'Precio', 'Cantidad', 'Estado'];
}
