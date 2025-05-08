<?php 
include('../app/config.php');
include('../layout/parte1.php');
include('../app/controllers/tatuajes/listado_tatu.php');
session_start();
if (isset($_SESSION['sesion_email'])){
$email = $_SESSION['sesion_email'];

$sql = "SELECT * FROM usuarios WHERE email = '$email'";
$query = $pdo->prepare($sql);
$query->execute();

$usuarios = $query->fetchAll(PDO::FETCH_ASSOC);
foreach($usuarios as $usuario){
  $id_usuario = $usuario['id_usuario'];
  $cargo_session= $usuario['cargo'];
  $nombre= $usuario['nombre_completo'];
}

} else{
 header('Location: '.$URL.'login/login.php');
}
?>

<section>
    
    <div class="container-fluid"><h1>Administrador</h1>
    <h2>Bienvenida <?php echo $nombre?></h2>
    <div>
    <a href="tatuajes/altas_t.php" class="btn btn-success text-white">
      <i class="bi bi-pencil"></i> Editar
    </a>
    <a href="tatuajes/papelera_t.php" class="btn btn-danger text-white">
      <i class="bi bi-trash"></i> Eliminar
     </a>
    </div>
    <div class="text-end mb-2" id="btnEliminarSeleccionados" style="display:none; margin-left: 80% ">
    <form id="formEliminarSeleccionados" action="../app/controllers/tatuajes/seleccionados/desactivar_seleccionados_t.php" method="POST">
        <input type="hidden" name="ids_seleccionados" id="ids_seleccionados">
        <button type="submit" class="btn btn-danger">
        Eliminar seleccionados
        </button>
    </form>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card card-outline card-primary">
                <div class="card-header">
                    <h3 class="card-title"><b>Imágenes</b></h3>
                </div>            
                <div class="card-body">
                    <table id="example1" class="table table-striped table-bordered table-hover">
                        <thead>
                            <tr>
                            <th><input type="checkbox" id="select_all"></th>             
                                <th>Título</th>
                                <th>Descripción</th>
                                <th>Imagen</th>                              
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                           
                            foreach($tatuajes as $tatuaje){                      
                                $id_tatuaje = $tatuaje['id_tatuaje'];
                                ?>
                                <tr>
                                <td><input type="checkbox" class="select-item" name="id_tatuajes[]" value="<?php echo $id_tatuaje; ?>"></td>                               
                                    <td><?php echo $tatuaje['titulo']?></td>
                                    <td><?php echo $tatuaje['descripcion']?></td>
                                    <td>
                                    <img src="../public/images/<?php echo $tatuaje['imagen']?>" alt="" width="90px">
                                    </td>
                                    <td>                                       
                                    <div class="btn-group btn-group-sm" role="group" aria-label="Basic example">
                                    <a href="vista_p.php?id_tatuaje=<?php echo $id_tatuaje;?>" class="btn btn-info text-white">
                                        <i class="bi bi-eye"></i> Ver
                                    </a>                                  
                                    <a href="update_p.php?id_tatuaje=<?php echo $id_tatuaje;?>" class="btn btn-success text-white">
                                        <i class="bi bi-pencil"></i> Editar
                                    </a>
                                    <a href="delete_p.php?id_tatuaje=<?php echo $id_tatuaje;?>" class="btn btn-danger text-white">
                                        <i class="bi bi-trash"></i> Eliminar
                                    </a>
                                </div>
                                    </td>
                                </tr>
                                <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
</section>
<script src="../public/js/listados.js"></script>
<?php 
include('../layout/parte2.php');
include('../layout/mensaje.php');
?>


