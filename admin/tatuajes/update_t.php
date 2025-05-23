<?php 
include('../../app/config.php');
include('../../layout/parte1.php');
$id_tatuaje = $_GET['id_tatuaje'];
include('../../app/controllers/tatuajes/datos_tatu.php');

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
      <img src="<?php echo $URL?>/public/images/logom.jpg" alt="Mistica Ink logo" style="margin-top: -20%">
    </div>
    <div class="form-right">
      <form action="<?php echo $URL?>/app/controllers/tatuajes/editar_tatu.php" method="POST" enctype="multipart/form-data">
        <div class="mb-2">
          <label for="titulo">Título*</label>
           <input type="text" name ="titulo" value="<?php echo $titulo;?>" class="form-control" required>
        </div>
        <div class="mb-2">
          <label for="descripcion">Descripción*</label>
         <textarea name="descripcion" id="descripcion" class="form-control" rows="3" required><?php echo $descripcion; ?></textarea>

        </div>
        <div class="mb-2">
          <label for="imagen">Imagen *</label>
          <input type="file" name="imagen" id="file" class="form-control" accept="image/*">
                  <output id="list"> <img src="<?php echo $URL."/public/images/".$imagen?>" alt="" width="18%"></output>
        </div>
        <input type="hidden" name="id_tatuaje" value="<?php echo $id_tatuaje; ?>">
        <div class="d-flex justify-content-end">
          <a href="<?php echo $URL?>admin/admin.php" class="btn btn-secondary">Cancelar</a>
          <button type="submit" class="btn btn-primary">Subir</button>
        </div>
      </form>
    </div>
  </div>
</section>
<script>
    function arquivo(evt){
    var files = evt.target.files;
    for(var i = 0, f; f = files[i]; i++) {
        if(!f.type.match('image.*')) {
            continue;
        }
        var reader = new FileReader();
        reader.onload = (function(theFile){
            return function(e){
                document.getElementById("list").innerHTML = ['<img class="thumb thumbnail" src="',e.target.result, '" width="20%" title="', escape(theFile.name), '"/>'].join('');
            };
        })(f);
        reader.readAsDataURL(f);
    }
}
document.getElementById("file").addEventListener('change', arquivo, false);

</script>
</body>
</html>