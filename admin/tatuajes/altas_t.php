<?php 
include('../../app/config.php');
include('../../layout/parte1.php');

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
  <div class="form-box">
    <div class="form-left">
      <img src="<?php echo $URL?>/public/images/logom.jpg" alt="Mistica Ink logo">
    </div>
    <div class="form-right">
      <form action="<?php echo $URL?>/app/controllers/tatuajes/registrar_tatu.php" method="POST" enctype="multipart/form-data">
        <div class="mb-2">
          <label for="titulo">Título*</label>
          <input type="text" name="titulo" id="titulo" class="form-control" required>
        </div>
        <div class="mb-2">
          <label for="descripcion">Descripción*</label>
          <textarea name="descripcion" id="descripcion" class="form-control" rows="3" required></textarea>
        </div>
        <div class="mb-2">
          <label for="imagen">Imagen *</label>
          <input type="file" name="imagen" id="imagen" class="form-control" accept="image/*" required>
        </div>
        <div class="d-flex justify-content-end">
          <a href="<?php echo $URL?>admin/admin.php" class="btn btn-secondary">Cancelar</a>
          <button type="submit" class="btn btn-primary">Subir</button>
        </div>
      </form>
    </div>
  </div>
</section>
</body>
</html>