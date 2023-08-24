<?php include('header.php'); ?>

<div class="container">
  <div class="row justify-content-center mt-5">
    <div class="col-md-6">
      <div class="card">
        <div class="card-header">
          <h2 class="text-center">Iniciar sesión</h2>
        </div>
        <div class="card-body">
          <?php if (session()->getFlashdata('error')) : ?>
            <div class="alert alert-danger">
              <?= session()->getFlashdata('error') ?>
            </div>
          <?php endif; ?>

          <form action="<?= base_url('usuarios/inicioSesion') ?>" method="post">
            <div class="form-group">
              <label for="nombre_usuario">Nombre de usuario:</label>
              <input type="text" class="form-control" name="nombre_usuario" value="<?= old('nombre_usuario') ?>" required>
            </div>
            <div class="form-group">
              <label for="contrasena">Contraseña:</label>
              <input type="password" class="form-control" name="contrasena" required>
            </div>
            <div class="text-center">
              <button type="submit" class="btn btn-primary">Iniciar sesión</button>
            </div>
          </form>
        </div>
        <div class="card-footer text-center">
          ¿No tienes una cuenta? <a href="<?= base_url('usuarios/register') ?>">Regístrate</a>
        </div>
      </div>
    </div>
  </div>
</div>

<?php include('footer.php'); ?>
