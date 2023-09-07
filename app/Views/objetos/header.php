<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?></title>
    <link rel="stylesheet" href="<?= base_url('Bootstrap/css/bootstrap.min.css') ?>">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Kaushan+Script&display=swap">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto&display=swap">
    <style>
        .table-header-dark th {
            background-color: #343a40;
            color: #fff;
        }

        body {
            margin: auto;
            font-family: 'Roboto', sans-serif;
            font-weight: bold;
            display: flex;
            flex-direction: column;
            min-height: 100vh;

        }

        h1,
        h2 {
            font-family: 'Kaushan Script', cursive;
            font-weight: bold;
            text-align: center;
        }



        nav,
        footer {
            width: 100%;
            display: block;
            box-sizing: border-box;
            font-family: 'Kaushan Script', cursive;
        }

        .navbar {
            background-color: #f8f9fa;
            padding: 10px;
        }

        .navbar-brand {
            font-weight: bold;
            font-size: 24px;
        }

        .navbar-toggler {
            border: none;
            padding: 0;
            width: 40px;
            height: 40px;
            background: transparent;
        }

        .navbar-toggler:focus {
            outline: none;
        }

        .navbar-toggler-icon {
            display: inline-block;
            width: 30px;
            height: 30px;
            background-image: url('data:image/svg+xml;charset=utf-8,%3Csvg viewBox="0 0 30 30" xmlns="http://www.w3.org/2000/svg"%3E%3Cpath stroke="%23333" stroke-linecap="round" stroke-miterlimit="10" stroke-width="2" d="M4 7h22M4 15h22M4 23h22"/%3E%3C/svg%3E');
            background-repeat: no-repeat;
            background-size: 100%;
            background-position: center;
        }

        .navbar-collapse {
            flex-basis: 100%;
            flex-grow: 1;
            overflow: hidden;
            max-height: 0;
            transition: max-height 0.35s ease-out;
        }

        .navbar-collapse.show {
            max-height: 100vh;
        }

        .navbar-nav {
            display: flex;
            flex-wrap: wrap;
            margin-left: -5px;
            margin-right: -5px;
            padding-left: 0;
            list-style: none;
        }

        .navbar-nav .nav-item {
            flex: 0 0 100%;
            max-width: 100%;
            padding-left: 5px;
            padding-right: 5px;
        }

        .navbar-nav .nav-link {
            display: block;
            padding: 10px;
            color: black;
            text-decoration: none;
            transition: background-color 0.3s;
        }

        .navbar-nav .nav-link:hover,
        .navbar-nav .nav-link:focus {
            background-color: #eee;
        }

        .container {
            margin: auto;
        }

        .table {
            max-width: calc(100% - 20px);
            margin: auto;
        }

        .table img {
            max-width: 100px;
            height: auto;
        }

        .table td,
        .table th {
            vertical-align: middle !important;
        }

        .btn-group {
            margin-bottom: 10px;
        }

        .dropdown-menu {
            display: block;
        }

        .btn-group button {
            margin-right: 5px;
        }

        .btn {
            margin: auto;
        }

        .main-content {
            flex: 1;
        }
    </style>
    <script type="module" src="https://ajax.googleapis.com/ajax/libs/model-viewer/3.1.1/model-viewer.min.js"></script>
</head>

<body>
    <nav class="navbar">
        <div class="container">
            <a class="navbar-brand" href="<?= base_url('usuarios/login') ?>">WEB 2</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url('/') ?>">Inicio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url('/') ?>">Objetos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url('productos') ?>">Productos</a>
                    </li>
                    <?php if (session()->has('usuario')) : ?>
                        <li class="nav-item ml-auto">
                            <a class="nav-link" href="<?= base_url('logout') ?>">Cerrar sesión</a>
                        </li>
                    <?php else : ?>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= base_url('usuarios/login') ?>">Iniciar sesión</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= base_url('usuarios/register') ?>">Registro</a>
                        </li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </nav>

    <script>
        const navbarCollapse = document.querySelector('.navbar-collapse');

        function toggleNavbarCollapse() {
            navbarCollapse.classList.toggle('show');
        }

        const navbarToggler = document.querySelector('.navbar-toggler');
        navbarToggler.addEventListener('click', toggleNavbarCollapse);
    </script>
    <div class="main-content">