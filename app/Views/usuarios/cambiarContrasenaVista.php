<?php if (session()->has('error')): ?>
    <div class="alert alert-danger">
        <?= session('error') ?>
    </div>
<?php endif; ?>

<h1>Cambiar contraseña</h1>
<form action="<?= base_url('usuarios/cambiarContrasena') ?>" method="post">
    <label for="contrasena_actual">Contraseña actual:</label>
    <input type="password" name="contrasena_actual" id="contrasena_actual" required>
    <br>
    <label for="contrasena_nueva">Nueva contraseña:</label>
    <input type="password" name="contrasena_nueva" id="contrasena_nueva" required>
    <br>
    <label for="contrasena_nueva_confirmacion">Confirmar nueva contraseña:</label>
    <input type="password" name="contrasena_nueva_confirmacion" id="contrasena_nueva_confirmacion" required>
    <br>
    <input type="submit" value="Cambiar contraseña">
</form>

