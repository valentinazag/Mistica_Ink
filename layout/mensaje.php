<?php
          if(isset($_SESSION['mensaje']) && isset($_SESSION['icono'])){ 
            $respuesta = $_SESSION['mensaje'];
            $icono = $_SESSION['icono'];
            ?>
            <script>
              Swal.fire({
              position: "top-end",
              icon: "<?php echo $icono?>",
              title: "<?php echo $respuesta?>",
              showConfirmButton: false,
              timer: 4000
            });           
            </script>
              <!-- <div class="alert alert-danger" rol="alert" >
              <?php/* echo $respuesta */?>
              </div> -->
            <?php
            unset($_SESSION['mensaje']);
          }
          ?>