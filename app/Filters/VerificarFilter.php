<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

use App\Models\UsuariosModel;
class VerificarFilter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        // Verificar si el usuario ha iniciado sesión
        if (!session()->has('usuario')) {
            // El usuario no ha iniciado sesión, redirigirlo a la página de inicio de sesión
            return redirect()->to('usuarios/login');
        }

        // Verificar si la cuenta del usuario está activa
        $usuariosModel = new UsuariosModel();
        $usuarioId = session()->get('usuario');
        $usuario = $usuariosModel->find($usuarioId);
        if ($usuario['activo'] == 1) {
            // La cuenta del usuario ya está activa, redirigirlo a la página principal
            return redirect()->to('/');
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // No es necesario hacer nada aquí
    }
}
