<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Verificar cuenta</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?= base_url('Templates/plugins/fontawesome-free/css/all.min.css') ?>">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="<?= base_url('Templates/plugins/icheck-bootstrap/icheck-bootstrap.min.css') ?>">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= base_url('Templates/dist/css/adminlte.min.css') ?>">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="<?= base_url('../../index2.html') ?>"><b>ImaginAR</b>+</a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      
    <h1>Verificar cuenta</h1>
<p>Por favor, ingresa el código de verificación que recibiste en tu correo electrónico para activar tu cuenta.</p>
      <form action="<?= base_url('usuarios/verificar') ?>" method="POST">
    <label for="codigo_verificacion">Código de verificación:</label>
    <input type="text" name="codigo_verificacion" id="codigo_verificacion" required>
    <button type="submit">Verificar</button>
</form>
<button onclick="location.href='<?= base_url('usuarios/reenviar') ?>'">Reenviar código</button>
        


<!-- jQuery -->
<script src="<?= base_url('Templates/plugins/jquery/jquery.min.js') ?>"></script>
<!-- Bootstrap 4 -->
<script src="<?= base_url('Templates/plugins/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
<!-- AdminLTE App -->
<script src="<?= base_url('Templates/dist/js/adminlte.min.js') ?>"></script>
</body>
</html>
