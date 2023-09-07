<?php include 'header.php'; ?>

<h1 class="my-4">Lista de productos</h1>
<table class="table">
    <thead>
        <tr class="table-header-dark">
            <th>ID</th>
            <th>Nombre</th>
            <th>Precio</th>
            <th>Cantidad</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($productos as $producto) : ?>
            <tr>
                <td><?= $producto['idProducto'] ?></td>
                <td><?= $producto['Nombre'] ?></td>
                <td><?= $producto['Precio'] ?></td>
                <td><?= $producto['Cantidad'] ?></td>
                <td>
                    <?php if (session()->get('usuario')['tipo_usuario'] === 'administrador') : ?>
                        <form action="<?= base_url('productos/delete/' . $producto['idProducto']) ?>" method="post">
                            <button type="button" class="btn btn-primary" onclick="location.href='<?= base_url('productos/edit/' . $producto['idProducto']) ?>'">Editar</button>
                            <?php if ($producto['Estado'] == 1) : ?>
                                <button type="button" class="btn btn-warning" onclick="location.href='<?= base_url('productos/disable/' . $producto['idProducto']) ?>'">Deshabilitar</button>
                            <?php else : ?>
                                <button type="button" class="btn btn-success" onclick="location.href='<?= base_url('productos/enable/' . $producto['idProducto']) ?>'">Habilitar</button>
                            <?php endif; ?>
                            <input type="hidden" name="_method" value="DELETE">
                            <button type="submit" class="btn btn-danger">Eliminar</button>
                        </form>
                    <?php endif; ?>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<?php if (session()->get('usuario')['tipo_usuario'] === 'administrador') : ?>
    <div>
        <button class="btn btn-success" onclick="location.href='<?= base_url('productos/create') ?>'">Agregar producto</button>
        <button class="btn btn-secondary" id="toggleDisabledBtn">Mostrar productos deshabilitados</button>
    </div>

    <div id="productosDeshabilitados" style="display: none;">
        <h2 class="my-4">Productos deshabilitados</h2>
        <table class="table">
            <thead>
                <tr class="table-header-dark">
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Precio</th>
                    <th>Cantidad</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($productos_deshabilitados as $producto) : ?>
                    <tr>
                        <td><?= $producto['idProducto'] ?></td>
                        <td><?= $producto['Nombre'] ?></td>
                        <td><?= $producto['Precio'] ?></td>
                        <td><?= $producto['Cantidad'] ?></td>
                        <td>
                            <form action="<?= base_url('productos/delete/' . $producto['idProducto']) ?>" method="post">
                                <button type="button" class="btn btn-success" onclick="location.href='<?= base_url('productos/enable/' . $producto['idProducto']) ?>'">Activar</button>
                                <input type="hidden" name="_method" value="DELETE">
                                <button type="submit" class="btn btn-danger">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
<?php endif; ?>

<script>
    document.getElementById("toggleDisabledBtn").addEventListener("click", function() {
        var productosDeshabilitadosDiv = document.getElementById("productosDeshabilitados");
        var display = productosDeshabilitadosDiv.style.display;
        productosDeshabilitadosDiv.style.display = display === "none" ? "block" : "none";
    });
</script>

</body>

</html>