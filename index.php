<?php
session_start();
include('app/config.php');
include('layout/parte1.php');
?>
<section class="sobre-mi py-5">
  <div class="container">
    <div class="row align-items-center">
      <!-- Imagen -->
      <div class="col-lg-6 mb-4 mb-lg-0">
        <img src="public/images/czlogo.jpg" alt="logo" class="img-fluid rounded shadow sobremi-img">
      </div>
      <!-- Texto -->
      <div class="col-lg-6">
        <h2 class="mb-4">Sobre <span class="resaltado">mí</span></h2>
        <p class="texto-sobre-mi">
        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin eu massa vitae mauris mattis dapibus. In velit tellus, dapibus non varius vitae, sollicitudin a sem. Nunc vestibulum, leo vel commodo vestibulum, ex est tincidunt elit, nec interdum ante quam quis lorem. Nam et vehicula mauris, vel tempus odio. Pellentesque ut faucibus augue, eu rhoncus est. Aenean tristique sollicitudin eros et tempus. Integer dictum massa vel metus dignissim, quis dictum lectus fringilla. 
        Ultrices mollis orci. Aliquam erat volutpat. Aliquam feugiat vehicula consectetur. Praesent dapibus ut enim quis posuere. Pellentesque convallis maximus iaculis.
        </p>
      </div>
    </div>
  </div>
</section>

<section class="container py-5">
  <h2 class="text-center mb-4">Mi Portafolio</h2>
  <div class="masonry">
    <img src="public/images/tobillot.jpeg"  class="gallery-img" alt="tobillo tatuaje flor">
    <img src="public/images/escorpiot.jpeg" class="gallery-img" alt="brazo tatuaje escorpión">
    <img src="public/images/espalda2t.jpeg" class="gallery-img" alt="espalda tatuada flores">
    <img src="public/images/espaldat.jpeg"  class="gallery-img" alt="espalda tatuada flor">
    <img src="public/images/luckyt.jpeg" class="gallery-img" alt="brazo tatuado lucky">  
    <img src="public/images/florest.jpeg" class="gallery-img" alt="pierna tatuada floral">
    <img src="public/images/abanicot.jpeg" class="gallery-img" alt="brazo tautuado abanico"> 
    <img src="public/images/certificadot.jpeg" class="gallery-img" alt="">
  </div>
</section>
<div class="modal fade" id="imgModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content bg-transparent border-0 text-center">
      <img id="modalImage" src="" class="img-fluid rounded shadow">
    </div>
  </div>
</div>
</body>
<script src="public/js/galeria.js"></script>
</html>
<?php
include('layout/parte2.php');
?>