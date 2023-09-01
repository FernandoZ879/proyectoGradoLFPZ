<h1>Cambiar Contraseña</h1>

<?php if(session()->getFlashdata('msg')): ?>
  <div class="alert alert-success"><?= session()->getFlashdata('msg') ?></div>
<?php endif; ?>

<form action="<?= base_url('actualizar-contrasena') ?>" method="post">

  <div class="form-group">
    <label>Contraseña Actual</label>
    <input type="password" name="contrasena_actual" class="form-control">
  </div>

  <div class="form-group"> 
    <label>Nueva Contraseña</label>
    <input type="password" name="nueva_contrasena" class="form-control">
  </div>

  <button type="submit" class="btn btn-primary">Guardar</button>
  
</form>