<?php 
include('../../app/config.php');
include('../../layout/parte1.php');

session_start();
if (isset($_SESSION['sesion_email'])){
$email = $_SESSION['sesion_email'];

$sql = "SELECT * FROM usuarios WHERE email = '$email'";
$query = $pdo->prepare($sql);
$query->execute();

} else{
 header('Location: '.$URL.'login/login.php');
}
?>

<section>
  <style>
    body {
      background-color: #000;
      color: #fff;
      font-family: 'Segoe UI', sans-serif;
    }

    .form-container {
      background-color: #400000; /* Bordó oscuro */
      border-radius: 20px;
      padding: 30px;
      max-width: 500px;
      margin: 60px auto;
      box-shadow: 0 0 20px rgba(255, 255, 255, 0.1);
    }

    .form-control, .form-control:focus {
      background-color: #000;
      color: #fff;
      border: 1px solid #ccc;
    }

    label {
      margin-top: 10px;
    }

    .btn-custom {
      background-color: #fff;
      color: #000;
      border: none;
    }

    .btn-custom:hover {
      background-color: #c00000;
      color: #fff;
    }

    .form-title {
      text-align: center;
      font-size: 24px;
      margin-bottom: 20px;
      color: #fff;
    }
  </style>
</head>
<body>
  <div class="form-container">
    <div class="form-title">
      <i class="bi bi-image"></i> Alta de Tatuajes
    </div>
    <form action="procesar_alta.php" method="POST" enctype="multipart/form-data">
      <div class="mb-3">
        <label for="titulo" class="form-label">Título (opcional)</label>
        <input type="text" class="form-control" id="titulo" name="titulo">
      </div>

      <div class="mb-3">
        <label for="descripcion" class="form-label">Descripción (opcional)</label>
        <textarea class="form-control" id="descripcion" name="descripcion" rows="3"></textarea>
      </div>

      <div class="mb-3">
        <label for="imagen" class="form-label">Imagen <span style="color: #f88">*</span></label>
        <input type="file" class="form-control" id="imagen" name="imagen" accept="image/*" required>
      </div>

      <button type="submit" class="btn btn-custom w-100 mt-3">Guardar</button>
    </form>
  </div>
</body>
</html>
</section>


<?php 
include('../layout/parte2.php');
?>