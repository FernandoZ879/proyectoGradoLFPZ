<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="<?= base_url('recursos/style.css') ?>">
  <!-- Fontawesome CDN Link -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Inicio</title>
</head>

<body>
  <!-- Header -->
  <header class="header">
    <nav class="nav">
      <a href="#" class="nav_logo">ImaginAR</a>

      <ul class="nav_items">
        <li class="nav_item">
          <a href="#" class="nav_link">Inicio</a>
          <a href="#" class="nav_link">Productos</a>
          <a href="#" class="nav_link">Servicios</a>
          <a href="#" class="nav_link">Contactos</a>
        </li>
      </ul>

      <div class="button-container">
        <button class="button" id="login-button">Iniciar Sesion</button>
        <button class="button" id="signup-button">Registro</button>
      </div>
    </nav>
  </header>


  <div class="container">
    <input type="checkbox" id="flip">
    <div class="cover">
      <div class="front">
        <img src="<?= base_url('recursos/images/ra1.jpg') ?>" alt="">
        <div class="text">
          <span class="text-1">Realidad aumentada<br>Mundo sin límites</span>
          <span class="text-2">Crea y descubre</span>
        </div>
      </div>
      <div class="back">
        <img class="backImg" src="<?= base_url('images/ra1.jpg') ?>" alt="">
        <div class="text">
          <span class="text-1">Complete miles of journey <br> with one step</span>
          <span class="text-2">Let's get started</span>
        </div>
      </div>
    </div>
    <div class="forms">
      <div class="form-content">
        <div class="login-form">
          <div class="title">Inicio Sesion</div>
          <div class="card-body">
            <?php if (session()->getFlashdata('error')) : ?>
              <div class="alert alert-danger">
                <?= session()->getFlashdata('error') ?>
              </div>
            <?php endif; ?>
            <?php if (session()->getFlashdata('success')) : ?>

              <div class="alert alert-success">
                <?= session()->getFlashdata('success') ?>
              </div>

            <?php endif; ?>
          </div>
          <form action="<?= base_url('usuarios/inicioSesion') ?>" method="post">
            <div class="input-boxes">
              <div class="input-box">
                <i class="fas fa-user"></i>
                <input type="text" class="form-control" name="nombre_usuario" value="<?= old('nombre_usuario') ?>" placeholder="Ingresa tu nombre de usuario" required>
              </div>
              <div class="input-box">
                <i class="fas fa-lock"></i>
                <input type="password" class="form-control" name="contrasena" placeholder="Ingresa tu contraseña" required />
                <i class="fas fa-eye-slash pw_hide"></i>
              </div>
              <div class="option_field">
                <span class="checkbox">
                  <input type="checkbox" id="check" />
                  <label for="check">Recuerdame</label>
                </span>
                <a href="#" class="forgot_pw">¿Olvidaste la contraseña?</a>
              </div>
              <div class="button input-box">
                <input type="submit" value="Iniciar Sesion">
              </div>
              <div class="text sign-up-text">¿No tienes una cuenta? <label for="flip">Regístrate</label></div>
            </div>
          </form>
        </div>
        <div class="signup-form">
          <div class="title">Registro</div>
          <div class="card-body">
            <?php if (isset($validation)) : ?>
              <div class="alert alert-danger">
                <?= $validation->listErrors() ?>
              </div>
              <script>
                document.querySelector('#flip').checked = true;
              </script>
            <?php endif; ?>
          </div>
          <form action="<?= base_url('usuarios/registro') ?>" method="post">
            <div class="input-boxes">
              <div class="input-box">
                <i class="fas fa-user"></i>
                <input type="text" class="form-control" name="nombre_usuario" value="<?= isset($nombre_usuario) ? $nombre_usuario : '' ?>" placeholder="Ingresa tu nombre" required>
              </div>
              <div class="input-box">
                <i class="fas fa-envelope"></i>
                <input type="email" class="form-control" name="correo_electronico" value="<?= isset($correo_electronico) ? $correo_electronico : '' ?>" placeholder="Ingresa tu correo" required>
              </div>
              <div class="input-box">
                <i class="fas fa-lock"></i>
                <input type="password" class="form-control" name="contrasena" placeholder="Ingresa tu contraseña" required>
                <i class="fas fa-eye-slash pw_hide"></i>
              </div>
              <div class="button input-box">
                <input type="submit" value="Registrarse">
              </div>
              <div class="text sign-up-text">¿Ya tienes una cuenta? <label for="flip">Inicia sesión</label></div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <script>
    const loginButton = document.querySelector("#login-button");
    const signupButton = document.querySelector("#signup-button");
    const flipCheckbox = document.querySelector("#flip");

    loginButton.addEventListener("click", () => {
      flipCheckbox.checked = false;
    });

    signupButton.addEventListener("click", () => {
      flipCheckbox.checked = true;
    });

    const pwHide = document.querySelectorAll(".pw_hide");

    pwHide.forEach((el) => {
      el.addEventListener("click", () => {
        const input = el.previousElementSibling;
        if (input.type === "password") {
          input.type = "text";
          el.classList.replace("fa-eye-slash", "fa-eye");
        } else {
          input.type = "password";
          el.classList.replace("fa-eye", "fa-eye-slash");
        }
      });
    });
  </script>
</body>

</html>