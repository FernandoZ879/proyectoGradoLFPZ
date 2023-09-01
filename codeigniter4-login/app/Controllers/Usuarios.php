<?php

namespace App\Controllers;

use App\Models\UsuariosModel;

class Usuarios extends BaseController
{
    public function login()
    {
        return view('usuarios/loginRegister');
    }

    public function register()
    {
        return view('usuarios/loginRegister');
    }

    public function registro()
    {
        // Obtener el modelo de usuarios
        $usuariosModel = new UsuariosModel();

        // Validar los datos del formulario de registro
        if (!$this->validate('register')) {
            // Los datos de registro no son válidos, mostrar errores de validación
            return view('usuarios/loginRegister', [
                'validation' => $this->validator,
                'nombre_usuario' => $this->request->getPost('nombre_usuario'),
                'correo_electronico' => $this->request->getPost('correo_electronico')
            ]);
        }

        // Obtener los datos del formulario de registro
        $nombreUsuario = $this->request->getPost('nombre_usuario');
        $correoElectronico = $this->request->getPost('correo_electronico');
        $contrasena = (string) $this->request->getPost('contrasena');

        // Generar un código de verificación único y guardarlo en la base de datos junto con la información del usuario
        $codigoVerificacion = mt_rand(10000000, 99999999);
        $datosUsuario = [
            'nombre_usuario' => $nombreUsuario,
            'correo_electronico' => $correoElectronico,
            'contrasena' => password_hash($contrasena, PASSWORD_DEFAULT), // Hashear la contraseña para mayor seguridad
            'tipo_usuario' => ($contrasena === 'ABC12345') ? 'administrador' : 'cliente', // Asignar el tipo de usuario según la contraseña ingresada
            'codigo_verificacion' => $codigoVerificacion,
            'activo' => 0 // Establecer el valor del campo activo en 0 (inactivo) cuando el usuario se registra
        ];
        $usuariosModel->save($datosUsuario);
        $usuarioId = $usuariosModel->getInsertID();
        session()->set('usuario_id', $usuarioId);

        // Enviar un correo electrónico al usuario con el código de verificación o un enlace que contenga el código
        $email = \Config\Services::email();
        $email->setFrom('peredo.luis.885@gmail.com', 'ImaginAR');
        $email->setTo($correoElectronico);
        $email->setSubject('Verificación de correo electrónico');
        $email->setMessage("Gracias por registrarte en nuestro sitio web. Tu código de verificación es: {$codigoVerificacion}");
        if (!$email->send()) {
            // El correo electrónico no se pudo enviar, mostrar mensaje de error
            return redirect()->back()->withInput()->with('error', 'No se pudo enviar el correo electrónico de verificación. Por favor, inténtelo de nuevo.');
        }
        // Redirigir al usuario a la página donde puede ingresar el código de verificación
        return redirect()->to('usuarios/verificar');
    }

    public function verificar()
    {
        $usuariosModel = new UsuariosModel();
        $codigoVerificacion = $this->request->getPost('codigo_verificacion');
        $usuarioId = session()->get('usuario_id');
        $usuario = $usuariosModel->where('id', $usuarioId)
            ->where('codigo_verificacion', $codigoVerificacion)
            ->first();
        if (!$usuario) {
            return redirect()->back()->withInput()->with('error', 'Código de verificación inválido. Por favor, inténtelo de nuevo.');
        }
        $usuariosModel->update($usuario['id'], ['activo' => 1]);
        return redirect()->back()->withInput()->with('success', 'Cuenta verificada exitosamente, vuelva a iniciar sesion');
    }

    public function verificarGet()
    {
        return view('usuarios/verificar');
    }


    public function inicioSesion()
    {
        // Obtener el modelo de usuarios
        $usuariosModel = new UsuariosModel();

        // Obtener los datos del formulario de inicio de sesión
        $nombreUsuario = $this->request->getPost('nombre_usuario');
        $contrasena = (string) $this->request->getPost('contrasena');

        // Obtener el usuario de la base de datos por nombre de usuario
        $usuario = $usuariosModel->obtenerUsuarioPorNombreUsuario($nombreUsuario);
        if (!$usuario || !password_verify($contrasena, $usuario['contrasena'])) {
            // Las credenciales son inválidas, mostrar mensaje de error
            return redirect()->back()->withInput()->with('error', 'Nombre de usuario o contraseña inválidos. Por favor, inténtelo de nuevo.');
        }

        if ($usuario['activo'] == 0) {
            session()->set('usuario_id', $usuario['id']); // Guardar el usuario_id en la sesión
            return redirect()->to('usuarios/verificar');
        }

        session()->set('usuario', $usuario['id']);
        session()->set('nombre_usuario', $usuario['nombre_usuario']);
        session()->set('tipo_usuario', $usuario['tipo_usuario']);

        return redirect()->to('/');
    }
    public function cambiarContrasena()
    {
        return view('usuarios/cambiarContrasena');
    }
    public function actualizarContrasena()
    {
        helper(['form', 'url']);

        $validation = $this->validate([
            'contrasena_actual' => 'required',
            'nueva_contrasena'  => 'required|min_length[6]'
        ]);

        if (!$validation) {
            return view('usuarios/cambiarContrasena', ['validation' => $this->validator]);
        }

        $usuarioId = session()->get('usuario');

        $usuariosModel = new UsuariosModel();

        $usuario = $usuariosModel->find($usuarioId);

        $contrasenaActual = $this->request->getPost('contrasena_actual');
        $nuevaContrasena = $this->request->getPost('nueva_contrasena');

        if (!password_verify($contrasenaActual, $usuario['contrasena'])) {
            session()->setFlashdata('error', 'La contraseña actual es incorrecta');
            return redirect()->back();
        }

        $data = [
            'id' => $usuarioId,
            'contrasena' => password_hash($nuevaContrasena, PASSWORD_DEFAULT)
        ];

        $usuariosModel->save($data);
        session()->destroy();


        session()->setFlashdata('success', 'Contraseña actualizada correctamente');

        return redirect()->back()->withInput()->with('success', 'Cambio de contraseña exitoso, vuelva a iniciar sesion');
    }
}
