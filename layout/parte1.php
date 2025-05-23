<?php session_start();

?>
<!doctype html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Mistica Ink</title>
    <link href="<?php echo $URL;?>public/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo $URL;?>public/css/index.css" rel="stylesheet">
    <link href="<?php echo $URL;?>public/css/altas_t.css" rel="stylesheet">
    <!-- jQuery para que funcione SweetAlert -->
 <script src="<?php echo $URL;?>/public/templates/AdminLTE-3.2.0/plugins/jquery/jquery.min.js"></script>
    
 <!-- Sweet Alert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> 
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
   <!-- DataTables -->
  <link rel="stylesheet" href="<?php echo $URL;?>public/templates/AdminLTE-3.2.0/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="<?php echo $URL;?>public/templates/AdminLTE-3.2.0/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="<?php echo $URL;?>public/templates/AdminLTE-3.2.0/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  <!-- Theme style -->
  </head>  
  <body>
  <nav class="navbar navbar-expand-lg bg-body-tertiary sticky-top shadow-sm">
    <div class="container-fluid">
      <a class="navbar-brand" href="<?php echo $URL;?>index.php">
        <img src="<?php echo $URL;?>public/images/logosol.jpg" alt="Logo" width="30" height="24" class="d-inline-block align-text-top">
        Mistica Ink
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse justify-content-between" id="navbarNav">
        <ul class="navbar-nav">
        <?php if (isset($_SESSION['sesion_email'])): ?>
  <li class="nav-item">
    <a class="nav-link" href="<?php echo $URL;?>index.php#home">Home</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="<?php echo $URL;?>index.php#portfolio">Mis trabajos</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="<?php echo $URL;?>index.php#contacto">Contacto</a>
  </li>
<?php else: ?>
  <li class="nav-item">
    <a class="nav-link active" href="#home">Home</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="#portfolio">Mis trabajos</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="#contacto">Contacto</a>
  </li>
<?php endif; ?>
        </ul>

        <!-- Login o Dropdown según sesión -->
        <ul class="navbar-nav">
          <?php if (isset($_SESSION['sesion_email'])): ?>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="usuarioDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="bi bi-person-circle fs-4 text-dark"></i>
              </a>
              <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="usuarioDropdown">
                <li><a class="dropdown-item" href="<?php echo $URL; ?>admin/admin.php">Administrador</a></li>
                <li><a class="dropdown-item" href="<?php echo $URL; ?>app/controllers/login/cerrar.php">Cerrar sesión</a></li>
              </ul>
            </li>
          <?php else: ?>
            <li class="nav-item">
              <a href="<?php echo $URL; ?>pages/login/login.php" class="nav-link">
                <i class="bi bi-person fs-4 text-dark"></i>
              </a>
            </li>
          <?php endif; ?>
        </ul>
      </div>
    </div>
  </nav>

    

  