<?php include('header.php'); ?>

<div class="container">
  <div class="row justify-content-center mt-5">
    <div class="col-md-6">
      <div class="card">
        <div class="card-header">
          <h2 class="text-center">Registro de usuario</h2>
        </div>
        <div class="card-body">
          <?php if (isset($validation)) : ?>
            <div class="alert alert-danger">
              <?= $validation->listErrors() ?>
            </div>
          <?php endif; ?>

          <form action="<?= base_url('usuarios/registro') ?>" method="post">
            <div class="form-group">
              <label for="nombre_usuario">Nombre de usuario:</label>
              <input type="text" class="form-control" name="nombre_usuario" value="<?= isset($nombre_usuario) ? $nombre_usuario : '' ?>" required>
            </div>
            <div class="form-group">
              <label for="correo_electronico">Correo electrónico:</label>
              <input type="email" class="form-control" name="correo_electronico" value="<?= isset($correo_electronico) ? $correo_electronico : '' ?>" required>
            </div>
            <div class="form-group">
              <label for="contrasena">Contraseña:</label>
              <input type="password" class="form-control" name="contrasena" required>
            </div>
            <div class="text-center">
              <button type="submit" class="btn btn-primary">Registrarse</button>
            </div>
          </form>
        </div>
        <div class="card-footer text-center">
          ¿Ya tienes una cuenta? <a href="<?= base_url('usuarios/login') ?>">Inicia sesión</a>
        </div>
      </div>
    </div>
  </div>
</div>

<?php include('footer.php'); ?>
