<?php
include("../../app/config.php");

?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?php echo APP_NAME?></title>
<!-- Bootstrap 5 CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<!-- Font Awesome (para los iconos fas) -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
<!-- Sweet Alert -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> 
  <link rel="stylesheet" href="../../public/css/login.css">
</head>
<body class="login-page">
<div class="login-box"> 
  <div class="login-logo">
    <b>INICIAR SESIÓN</b>
  </div>
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg"><b>Ingresa tus datos </b></p>
      <hr>
      <form action="<?php echo $URL;?>app/controllers/login/controller_login.php" method="post">
        <label for="">Correo electrónico</label>
        <div class="input-group mb-3">
          <input type="email" class="form-control" name="email" placeholder="Email">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <label for="">Contraseña</label>
        <div class="input-group mb-3">
          <input type="password" name="password" class="form-control" placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <hr>
        <button class="btn btn-primary" type="submit" style="width:100%;";>Ingresar</button>
        <br><br>
        <a href="<?php echo $URL;?>index.php" class="btn btn-secondary" style="width:100%;">Cancelar</a>
      </form>
    </div>
  </div>
</div>
</body>
</html>
