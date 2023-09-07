<!DOCTYPE html>
<html lang="en">
<head>
 <meta charset="UTF-8">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <title>WEB 2</title>
 <link rel="stylesheet" href="<?= base_url('Bootstrap/css/bootstrap.min.css') ?>">
 <style>
   body {
     display: flex;
     flex-direction: column;
     min-height: 100vh;
   }

   .navbar {
     background-color: #f8f9fa; /* Color de fondo */
     padding: 10px;
   }
   .navbar-brand {
     font-weight: bold;
     font-size: 24px;
   }
   .navbar-nav {
     margin-left: auto;
   }
   .navbar-nav .nav-link {
     margin-right: 10px;
   }

   .container {
     flex: 1;
   }
 </style>
</head>
<body>
 <nav class="navbar navbar-expand-lg">
   <a class="navbar-brand" href="<?= base_url('usuarios/login') ?>">WEB 2</a>
   <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
     aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
     <span class="navbar-toggler-icon"></span>
   </button>
   <div class="collapse navbar-collapse" id="navbarNav">
     <ul class="navbar-nav">
       <li class="nav-item">
         <a class="nav-link" href="<?= base_url('usuarios/login') ?>">Iniciar sesión</a>
       </li>
       <li class="nav-item">
         <a class="nav-link" href="<?= base_url('usuarios/register') ?>">Registro</a>
       </li>
     </ul>
   </div>
 </nav>


