<?php include 'header.php'; ?>

<h1 class="my-4">LISTA DE OBJETOS</h1>
<div class="table-responsive">
    <table class="table">
        <thead>
            <tr class="table-header-dark">
                <?php
                $headers = ['Nombre', 'Descripción', 'Dimensiones XYZ', 'Material', 'Precio', 'Imagen', 'Nombre Archivo Modelo', 'Modelo 3D'];
                foreach ($headers as $header) {
                    echo "<th class='text-center'>$header</th>";
                }
                ?>
                          <?php if (session()->get('tipo_usuario') === 'administrador') : ?>
                    <th>Acciones</th>
                <?php endif; ?>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($objetos as $objeto) : ?>
                <tr>
                    <td><?= $objeto['nombre'] ?></td>
                    <td><?= $objeto['descripcion'] ?></td>
                    <td><?= $objeto['dimensionesXYZ'] ?></td>
                    <td><?= $objeto['material'] ?></td>
                    <td><?= $objeto['precio'] ?></td>
                    <td>
                        <?php if (!empty($objeto['imagen'])) : ?>
                            <img src="data:image/jpeg;base64,<?= base64_encode($objeto['imagen']) ?>" alt="Imagen del objeto">
                        <?php else : ?>
                            Sin imagen
                        <?php endif; ?>
                    </td>
                    <td><?= !empty($objeto['nombreArchivoModelo']) ? $objeto['nombreArchivoModelo'] : 'Sin nombre de archivo de modelo' ?></td>
                    <td>
                        <?php if (!empty($objeto['nombreArchivoModelo'])) : ?>
                            <model-viewer src="<?= base_url('modelos/' . $objeto['nombreArchivoModelo']) ?>" ar ar-modes="scene-viewer webxr quick-look" shadow-intensity="1" camera-controls touch-action="pan-y"></model-viewer>
                        <?php else : ?>
                            Sin Modelo 3D
                        <?php endif; ?>
                    </td>
                    <?php if (session()->get('tipo_usuario') === 'administrador') : ?>
                        <td>
                            <form action="<?= base_url('objetos/delete/' . $objeto['idObjeto']) ?>" method="post">
                                <div class="btn-group d-flex justify-content-between">
                                    <button type="button" class="btn btn-primary" onclick="location.href='<?= base_url('objetos/edit/' . $objeto['idObjeto']) ?>'">Editar</button>

                                    <?php if ($objeto['estado'] == 1) : ?>
                                        <button type="button" class="btn btn-warning" onclick="location.href='<?= base_url('objetos/disable/' . $objeto['idObjeto']) ?>'">Deshabilitar</button>

                                    <?php else : ?>
                                        <button type="button" class="btn btn-success" onclick="location.href='<?= base_url('objetos/enable/' . $objeto['idObjeto']) ?>'">Habilitar</button>

                                    <?php endif; ?>
                                    <input type="hidden" name="_method" value="DELETE">
                                    <button type="submit" class="btn btn-danger">Eliminar</button>
                                </div>
                            </form>
                        </td>
                    <?php endif; ?>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<?php if (session()->get('tipo_usuario') === 'administrador') : ?>
    <div class="btn">
        <button class="btn btn-success" onclick="location.href='<?= base_url('objetos/create') ?>'">Agregar objeto</button>
        <button class="btn btn-secondary" id="toggleDisabledBtn">Mostrar objetos deshabilitados</button>
    </div>

    <div id="objetosDeshabilitados" style="display: none;">
        <h2 class="my-4">OBJETOS DESHABILITADOS</h2>
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr class="table-header-dark">
                        <?php
                        $headers = ['Nombre', 'Descripción', 'Dimensiones XYZ', 'Material', 'Precio', 'Imagen', 'Nombre Archivo Modelo', 'Modelo 3D', 'Acciones'];
                        foreach ($headers as $header) {
                            echo "<th class='text-center'>$header</th>";
                        }
                        ?>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($objetos_deshabilitados as $objeto) : ?>
                        <tr>
                            <td><?= $objeto['nombre'] ?></td>
                            <td><?= $objeto['descripcion'] ?></td>
                            <td><?= $objeto['dimensionesXYZ'] ?></td>
                            <td><?= $objeto['material'] ?></td>
                            <td><?= $objeto['precio'] ?></td>
                            <td>
                                <?php if (!empty($objeto['imagen'])) : ?>
                                    <img src="data:image/jpeg;base64,<?= base64_encode($objeto['imagen']) ?>" alt="Imagen del objeto">
                                <?php else : ?>
                                    Sin imagen
                                <?php endif; ?>
                            </td>
                            <td><?= !empty($objeto['nombreArchivoModelo']) ? $objeto['nombreArchivoModelo'] : 'Sin nombre de archivo de modelo' ?></td>
                            <td>
                                <?php if (!empty($objeto['nombreArchivoModelo'])) : ?>
                                    <model-viewer src="<?= base_url('modelos/' . $objeto['nombreArchivoModelo']) ?>" shadow-intensity="1" camera-controls touch-action="pan-y"></model-viewer>
                                <?php else : ?>
                                    Sin Modelo 3D
                                <?php endif; ?>
                            </td>
                            <td>
                                <form action="<?= base_url('objetos/delete/' . $objeto['idObjeto']) ?>" method="post">
                                    <div class="btn-group d-flex justify-content-between">
                                        <button type="button" class="btn btn-success" onclick="location.href='<?= base_url('objetos/enable/' . $objeto['idObjeto']) ?>'">Activar</button>
                                        <input type="hidden" name="_method" value="DELETE">
                                        <button type="submit" class="btn btn-danger">Eliminar</button>
                                    </div>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
<?php endif; ?>
<script>
    document.getElementById("toggleDisabledBtn").addEventListener("click", function() {
        var objetosDeshabilitadosDiv = document.getElementById("objetosDeshabilitados");
        var display = objetosDeshabilitadosDiv.style.display;
        objetosDeshabilitadosDiv.style.display = display === "none" ? "block" : "none";
    });
</script>

<?php include('footer.php'); ?>
