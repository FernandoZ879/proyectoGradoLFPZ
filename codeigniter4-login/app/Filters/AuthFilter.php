<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class AuthFilter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
     // Verificar si el usuario ha iniciado sesión
     if (!session()->has('usuario')) {
     // El usuario no ha iniciado sesión, redirigirlo a la página de inicio de sesión
     return redirect()->to('usuarios/login');
     }
    }
    

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
     // No es necesario hacer nada aquí
    }
    
}
