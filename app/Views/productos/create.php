<?php include 'header.php'; ?>

<h1 class="my-4">Agregar producto</h1>

<form action="<?= base_url('productos/store') ?>" method="post">
    <div class="mb-3">
        <label for="Nombre" class="form-label">Nombre:</label>
        <input type="text" name="Nombre" id="Nombre" class="form-control" required>
    </div>

    <div class="mb-3">
        <label for="Precio" class="form-label">Precio:</label>
        <input type="number" name="Precio" id="Precio" step="0.01" class="form-control" required>
    </div>

    <div class="mb-3">
        <label for="Cantidad" class="form-label">Cantidad:</label>
        <input type="number" name="Cantidad" id="Cantidad" class="form-control" required>
    </div>

    <input type="submit" value="Guardar" class="btn btn-primary">
</form>
</body>

</html>