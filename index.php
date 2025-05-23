<?php

include('app/config.php');
include('layout/parte1.php');
include('app/controllers/tatuajes/listado_tatu.php');
?>
<section id="home" class="sobre-mi py-5">
  <div class="container">
    <div class="row align-items-center">
      <div class="col-lg-6 mb-4 mb-lg-0">
        <img src="public/images/logom.jpg" alt="logo" class="img-fluid rounded shadow sobremi-img">
      </div>
      <div class="col-lg-6">
        <h2 class="mb-4">Sobre <span class="resaltado">mí</span></h2>
        <p class="texto-sobre-mi">
        ¡Hola! Soy Mística, soy tatuadora profesional y amante del arte en todas sus formas. 
        Cada tatuaje que hago tiene una historia, un propósito y un pedacito de alma. Me encanta escuchar lo que cada persona quiere expresar, para convertirlo en un diseño único que hable por sí solo. Me especializo en líneas finas, minimalismo y blackwork, aunque siempre estoy abierta a nuevos desafíos.
        Trabajo en un espacio seguro, cómodo y lleno de buena energía, porque creo que tatuarse también es una experiencia que se recuerda más allá de la tinta. Si tenés una idea, por más loca o simple que parezca, ¡charlémosla! Estoy para ayudarte a convertirla en arte.
        Gracias por confiar en mí para algo tan especial.✨
        </p>
      </div>
    </div>
  </div>
</section>

<section id="portfolio" class="container py-5">
  <h2 class="text-center mb-4">Mi Porfolio</h2>
 <div class="masonry">
 <?php foreach ($tatuajes as $tatuaje): ?>
  <img 
    src="public/images/<?php echo htmlspecialchars($tatuaje['imagen']); ?>" 
    class="gallery-img" 
    alt="<?php echo htmlspecialchars($tatuaje['titulo']); ?>" 
    data-bs-toggle="modal" 
    data-bs-target="#imgModal"
    data-title="<?php echo htmlspecialchars($tatuaje['titulo']); ?>"
    data-description="<?php echo htmlspecialchars($tatuaje['descripcion']); ?>"
  >
<?php endforeach; ?>
</div>
</section>
<div class="modal fade" id="imgModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content bg-dark text-white rounded shadow-lg border-0 p-3">
      <img id="modalImage" src="" class="img-fluid rounded mb-3">
      <h5 id="modalTitle" class="text-center resaltado mb-2"></h5>
      <p id="modalDescription" class="text-center small text-light"></p>
    </div>
  </div>
</div>
</body>
<script src="public/js/galeria.js"></script>
<script>
  const secciones = document.querySelectorAll("section[id]");
const enlaces = document.querySelectorAll(".navbar-nav .nav-link");

function activarEnlace() {
  let scrollY = window.scrollY;

  secciones.forEach(sec => {
    const top = sec.offsetTop - 150;
    const height = sec.offsetHeight;
    const id = sec.getAttribute("id");

    if (scrollY >= top && scrollY < top + height) {
      enlaces.forEach(link => {
        link.classList.remove("active");
        if (link.getAttribute("href").includes(id)) {
          link.classList.add("active");
        }
      });
    }
  });
}

window.addEventListener("scroll", activarEnlace);

</script>
</html>
<?php
include('layout/parte2.php');
?>
