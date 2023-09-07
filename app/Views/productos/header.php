<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?></title>
    <link rel="stylesheet" href="<?= base_url('Bootstrap/css/bootstrap.min.css') ?>">
    <style>
        .table-header-dark th {
            background-color: #343a40;
            color: #fff;
        }
        body {
            margin: 0 auto;
            max-width: 800px;
        }
        h1 {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        nav {
            background-color: #f8f9fa;
            padding: 10px;
            width: 100%;
        }
        nav ul {
            list-style: none;
            margin: 0;
            padding: 0;
            display: flex;
        }
        nav li {
            margin-right: 10px;
        }
        nav a {
            color: #007bff;
            text-decoration: none;
        }
    </style>
</head>
<body>
    <nav>
        <ul>
            <li><a href="<?= base_url('/') ?>">Inicio</a></li>
            <!-- Otros elementos de navegación -->
            <?php if (session()->has('usuario')) : ?>
                <li><a href="<?= base_url('logout') ?>">Cerrar sesión</a></li>
            <?php endif; ?>
        </ul>
    </nav>
</body>
</html>
