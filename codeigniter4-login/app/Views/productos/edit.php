<?php include 'header.php'; ?>

<h1 class="my-4">Editar producto</h1>

<form action="<?= base_url('productos/update/' . $producto['idProducto']) ?>" method="post">
    <input type="hidden" name="_method" value="PUT">

    <div class="mb-3">
        <label for="Nombre" class="form-label">Nombre:</label>
        <input type="text" name="Nombre" id="Nombre" value="<?= $producto['Nombre'] ?>" class="form-control" required>
    </div>

    <div class="mb-3">
        <label for="Precio" class="form-label">Precio:</label>
        <input type="number" name="Precio" id="Precio" value="<?= $producto['Precio'] ?>" step="0.01" class="form-control" required>
    </div>

    <div class="mb-3">
        <label for="Cantidad" class="form-label">Cantidad:</label>
        <input type="number" name="Cantidad" id="Cantidad" value="<?= $producto['Cantidad'] ?>" class="form-control" required>
    </div>

    <input type="submit" value="Guardar" class="btn btn-primary">
</form>

</body>

</html>