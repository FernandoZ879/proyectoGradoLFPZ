<?php include 'header.php'; ?>

<div class="container">

  <h1>Crear Usuario</h1>

  <form method="post" action="<?= base_url('usuarios/store') ?>" enctype="multipart/form-data">

    <div class="form-group">
      <label>Nombre</label>    
      <input type="text" name="nombre_usuario" class="form-control">
    </div>

    <div class="form-group">
      <label>Email</label>
      <input type="email" name="correo_electronico" class="form-control"> 
    </div>

    <div class="form-group">
      <label>Contraseña</label>
      <input type="password" name="contrasena" class="form-control">
    </div>

    <!-- Campos edad, fecha nacimiento, etc -->

    <div class="form-group">
      <label>Imagen</label>
      <input type="file" name="imagen" class="form-control-file">
    </div>

    <button type="submit" class="btn btn-primary">Guardar</button>

  </form>

</div>

<?php include 'footer.php'; ?>