<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>CRUD</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?= base_url('Templates/plugins/fontawesome-free/css/all.min.css') ?>">
  <!-- DataTables -->
  <link rel="stylesheet" href="<?= base_url('Templates/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') ?>">
  <link rel="stylesheet" href="<?= base_url('Templates/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') ?>">
  <link rel="stylesheet" href="<?= base_url('Templates/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') ?>">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= base_url('Templates/dist/css/adminlte.min.css') ?>">
</head>

<body class="hold-transition sidebar-mini">
  <div class="wrapper">
    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
          <a href="<?= base_url('/') ?>" class="nav-link">Inicio</a>
        </li>
        <?php if (session()->has('usuario')) : ?>
          <li class="nav-item d-none d-sm-inline-block">
            <a href="<?= base_url('logout') ?>" class="nav-link">Cerrar sesión</a>
          </li>
        <?php endif; ?>
      </ul>

      <!-- Right navbar links -->
      <ul class="navbar-nav ml-auto">

        <li class="nav-item">
          <a class="nav-link" data-widget="fullscreen" href="#" role="button">
            <i class="fas fa-expand-arrows-alt"></i>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
            <i class="fas fa-th-large"></i>
          </a>
        </li>
      </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="../../index3.html" class="brand-link">
        <img src="<?= base_url('Templates/dist/img/AdminLTELogo.png') ?>" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">WEB 2</span>
      </a>

      <!-- Sidebar -->
      <div class="sidebar">
        <!-- Sidebar user (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <div class="image">
            <img src="<?= base_url('Templates/dist/img/user2-160x160.jpg') ?>" class="img-circle elevation-2" alt="User Image">
          </div>
          <div class="info">
            <a href="#" class="d-block">Luis Fernando</a>
          </div>
        </div>

        <!-- SidebarSearch Form -->
        <div class="form-inline">
          <div class="input-group" data-widget="sidebar-search">
            <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
            <div class="input-group-append">
              <button class="btn btn-sidebar">
                <i class="fas fa-search fa-fw"></i>
              </button>
            </div>
          </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->


            <li class="nav-item menu-open">
              <a href="#" class="nav-link active">
                <i class="nav-icon fas fa-table"></i>
                <p>
                  Tablas
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="../tables/simple.html" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Simple Tables</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="../tables/data.html" class="nav-link active">
                    <i class="far fa-circle nav-icon"></i>
                    <p>DataTables</p>
                  </a>
                </li>
                
              </ul>
            </li>
            <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Simple Link
                <span class="right badge badge-danger">New</span>
              </p>
            </a>
          </li>

          </ul>
        </nav>
        <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>Productos</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="<?= base_url('/') ?>">Inicio</a></li>
                <li class="breadcrumb-item active">DataTables</li>
              </ol>
            </div>
          </div>
        </div><!-- /.container-fluid -->
      </section>

      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <h3 class="card-title">Lista de Productos</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
<!-- Vista con botón para generar reporte -->
<button onclick="location.href='<?= base_url('productos/generarReporteProductos') ?>'">Generar Reporte PDF</button>

                  <table id="example2" class="table table-bordered table-hover">
                    <thead>
                      <tr>
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
                    <tfoot>
                      <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Precio</th>
                        <th>Cantidad</th>
                        <th>Acciones</th>
                      </tr>
                    </tfoot>
                  </table>
                </div>
               
                <!-- /.card-body -->



              </div>
              <!-- /.card -->

              <div class="card">
                <div class="card-header">
                  <h3 class="card-title">Lista de Productos</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <table id="example1" class="table table-bordered table-hover">
                    <thead>
                      <tr>
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
                    <tfoot>
                      <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Precio</th>
                        <th>Cantidad</th>
                        <th>Acciones</th>
                      </tr>
                    </tfoot>
                  </table>
                </div>
                <div class="card-body">
                  <?php if (session()->get('usuario')['tipo_usuario'] === 'administrador') : ?>
                    <div>
                      <button class="btn btn-success" onclick="location.href='<?= base_url('productos/create') ?>'">Agregar producto</button>
                      <button class="btn btn-secondary" id="toggleDisabledBtn1">Mostrar productos deshabilitados</button>
                    </div>

                    <div id="productosDeshabilitados1" style="display: none;">
                      <div class="card-header">
                        <h3 class="card-title">Productos deshabilitados</h3>
                      </div>
                      <table id="example1" class="table table-bordered table-hover">
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
                    document.getElementById("toggleDisabledBtn1").addEventListener("click", function() {
                      var productosDeshabilitadosDiv = document.getElementById("productosDeshabilitados1");
                      var display = productosDeshabilitadosDiv.style.display;
                      productosDeshabilitadosDiv.style.display = display === "none" ? "block" : "none";
                    });
                  </script>
                </div>
                <!-- /.card-body -->



              </div>
              <!-- /.card -->
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
      </section>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <footer class="main-footer">
      <div class="float-right d-none d-sm-block">
        <b>Version</b> 3.2.0
      </div>
      <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
    </footer>

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
      <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
  </div>
  <!-- ./wrapper -->

  <!-- jQuery -->
  <script src="<?= base_url('Templates/plugins/jquery/jquery.min.js') ?>"></script>
  <!-- Bootstrap 4 -->
  <script src="<?= base_url('Templates/plugins/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
  <!-- DataTables  & Plugins -->
  <script src="<?= base_url('Templates/plugins/datatables/jquery.dataTables.min.js') ?>"></script>
  <script src="<?= base_url('Templates/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') ?>"></script>
  <script src="<?= base_url('Templates/plugins/datatables-responsive/js/dataTables.responsive.min.js') ?>"></script>
  <script src="<?= base_url('Templates/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') ?>"></script>
  <script src="<?= base_url('Templates/plugins/datatables-buttons/js/dataTables.buttons.min.js') ?>"></script>
  <script src="<?= base_url('Templates/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') ?>"></script>
  <script src="<?= base_url('Templates/plugins/jszip/jszip.min.js') ?>"></script>
  <script src="<?= base_url('Templates/plugins/pdfmake/pdfmake.min.js') ?>"></script>
  <script src="<?= base_url('Templates/plugins/pdfmake/vfs_fonts.js') ?>"></script>
  <script src="<?= base_url('Templates/plugins/datatables-buttons/js/buttons.html5.min.js') ?>"></script>
  <script src="<?= base_url('Templates/plugins/datatables-buttons/js/buttons.print.min.js') ?>"></script>
  <script src="<?= base_url('Templates/plugins/datatables-buttons/js/buttons.colVis.min.js') ?>"></script>
  <!-- AdminLTE App -->
  <script src="<?= base_url('Templates/dist/js/adminlte.min.js') ?>"></script>
  <!-- AdminLTE for demo purposes -->
  <script src="<?= base_url('Templates/dist/js/demo.js') ?>"></script>
  <!-- Page specific script -->
  <script>
    $(function() {
      $("#example1").DataTable({
        "responsive": true,
        "lengthChange": false,
        "autoWidth": false,
        "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
      }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
      $('#example2').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": false,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
      });
    });
  </script>
</body>

</html>