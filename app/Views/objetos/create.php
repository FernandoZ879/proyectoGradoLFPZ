<?php include 'header.php'; ?>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card mt-4">
                <div class="card-body">
                    <h1 class="my-4">Agregar objeto</h1>

                    <form action="<?= base_url('objetos/store') ?>" method="post" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label for="nombre" class="form-label">Nombre:</label>
                            <input type="text" name="nombre" id="nombre" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label for="descripcion" class="form-label">Descripción:</label>
                            <textarea name="descripcion" id="descripcion" class="form-control" required></textarea>
                        </div>

                        <div class="mb-3">
                            <label for="dimensionesXYZ" class="form-label">Dimensiones XYZ:</label>
                            <input type="text" name="dimensionesXYZ" id="dimensionesXYZ" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label for="material" class="form-label">Material:</label>
                            <input type="text" name="material" id="material" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label for="precio" class="form-label">Precio:</label>
                            <input type="number" name="precio" id="precio" step="0.01" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label for="imagen" class="form-label">Imagen:</label>
                            <input type="file" name="imagen" id="imagen" class="form-control-file" accept="image/jpeg,image/png,image/gif">
                        </div>

                        <div class="mb-3">
                            <label for="modelo3D" class="form-label">Modelo 3D:</label>
                            <input type="file" name="modelo3D" id="modelo3D" class="form-control-file" accept=".gltf,.glb">
                            <small class="form-text text-muted">Solo se aceptan formatos .glb y .gltf</small>
                        </div>

                        <input type="submit" value="Guardar" class="btn btn-primary">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include('footer.php'); ?>
