<footer id="contacto" class="container-fluid bg theme-dark text-white mt-5 py-4" style="background-color: rgba(41, 0, 0, 0.88)">
  <div class="container">
    <div class="row text-center text-md-start align-items-center">
      <div class="col-md-4 mb-4 mb-md-0 d-flex justify-content-center justify-content-md-start align-items-center">
        <a href="<?php echo $URL?>index.php" target="_blank">
          <img src="<?php echo $URL?>/public/images/logosol.jpg" alt="Misitca Ink logo" style="width: 40%;">
        </a>
      </div>
      
      <div class="col-md-4 mb-4 mb-md-0">
        <div class="d-flex flex-column align-items-center">
          <?php if (isset($_SESSION['sesion_email'])): ?>
            <a href="<?php echo $URL;?>index.php#home" class="btn text-white">Home</a>
            <a href="<?php echo $URL;?>index.php#portfolio" class="btn text-white">Galería</a>
          <?php else: ?>
            <a href="#home" class="btn text-white">Home</a>
            <a href="#portfolio" class="btn text-white">Galería</a>
          <?php endif; ?>     
        </div>
      </div>
      
      <div class="col-md-4 text-center text-md-start">
        <p class="mb-2">
          <i class="bi bi-instagram"></i> 
          <a href="#" target="_blank" class="text-white text-decoration-none">Mistica_Ink</a>
        </p>
        <p><i class="bi bi-geo-alt"></i>Buenos Aires</p>
      </div>
    </div>
  </div>
<div class="text-center mt-4">
  <p class="mb-0 small"><i class="bi bi-c-circle"></i> Todos los derechos reservados, Zagman Valentina 2025 <i class="bi bi-c-circle"></i></p>
</div>
</footer>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"></script>

<script src="<?php echo $URL;?>/public/templates/AdminLTE-3.2.0/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo $URL;?>/public/templates/AdminLTE-3.2.0/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?php echo $URL;?>/public/templates/AdminLTE-3.2.0/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?php echo $URL;?>/public/templates/AdminLTE-3.2.0/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="<?php echo $URL;?>/public/templates/AdminLTE-3.2.0/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="<?php echo $URL;?>/public/templates/AdminLTE-3.2.0/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="<?php echo $URL;?>/public/templates/AdminLTE-3.2.0/plugins/jszip/jszip.min.js"></script>
<script src="<?php echo $URL;?>/public/templates/AdminLTE-3.2.0/plugins/pdfmake/pdfmake.min.js"></script>
<script src="<?php echo $URL;?>/public/templates/AdminLTE-3.2.0/plugins/pdfmake/vfs_fonts.js"></script>
<script src="<?php echo $URL;?>/public/templates/AdminLTE-3.2.0/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="<?php echo $URL;?>/public/templates/AdminLTE-3.2.0/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="<?php echo $URL;?>/public/templates/AdminLTE-3.2.0/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>  
<script>

 document.addEventListener("DOMContentLoaded", function () {

    document.querySelectorAll('.nav-link').forEach(link => {
      link.addEventListener('click', function (e) {
        const targetId = this.getAttribute('href');
        if (targetId.startsWith("#")) {
          e.preventDefault();
          const target = document.querySelector(targetId);
          if (target) {
            target.scrollIntoView({ behavior: 'smooth' });
          }
        }
      });
    });

    const secciones = document.querySelectorAll("section[id], footer[id]");
    const enlaces = document.querySelectorAll(".navbar-nav .nav-link");

    function activarEnlace() {
  let scrollY = window.scrollY;
  let ventanaAltura = window.innerHeight;
  let docAltura = document.body.offsetHeight;

  secciones.forEach((sec, i) => {
    const top = sec.offsetTop - 200;
    const height = sec.offsetHeight;
    const id = sec.getAttribute("id");
    const esUltima = i === secciones.length - 1;
    const bottomScroll = scrollY + ventanaAltura;

    const visible = (scrollY >= top && scrollY < top + height) ||
                    (esUltima && bottomScroll >= docAltura - 2); // último margen

    if (visible) {
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
    activarEnlace(); 
    });

</script>

</body>
</html>