<?php 
include('../../app/config.php');
include('../../layout/parte1.php');
include('../../app/controllers/tatuajes/listado_tatu.php');
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

<div class="container-fluid">
    <h1>
        Papelera de tatuajes
    </h1>
    <div class="row">
    <div class="text-end mb-2" id="btnEliminarSeleccionados" style="display:none; margin-left:70%">
        <div class="d-flex justify-content-end gap-2">
        <form id="formEliminarSeleccionados" action="../../app/controllers/tatuajes/seleccionados/desactivar_seleccionados_t.php" method="POST">
    <input type="hidden" name="ids_seleccionados" id="ids_seleccionados_eliminar">
    <button type="submit" class="btn btn-danger">
        Eliminar definitivamente
    </button>
</form>

<form id="formRestaurarSeleccionados" action="../../app/controllers/tatuajes/seleccionados/restaurar_seleccionados_t.php" method="POST">
    <input type="hidden" name="ids_seleccionados" id="ids_seleccionados_restaurar">
    <button type="submit" class="btn btn-success" style="margin-left: 5%;">
        Restaurar
    </button>
</form>
</div>
</div>
</div> 
    <div class="row">
        <div class="col-md-12">
            <div class="card card-outline card-warning">
                <div class="card-header">
                    <h3 class="card-title"><b>Tatuajes en papelera</b></h3>
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
                                    <img src="../../../public/images/tatuajes/<?php echo $tatuaje['imagen']?>" alt="" width="90px">
                                    </td>
                                    <td>                                   
                                    <div class="col-md-12">
                                        <div class="row">
                                         <a href="../../app/controllers/tatuajes/estado/restaurar_tatu.php?id_tatuaje=<?php echo $id_tatuaje;?>" class="btn btn-success text-white">
                                         Restaurar
                                         </a>
                                         <a href="../../app/controllers/tatuajes/eliminar_tatu.php?id_tatuaje=<?php echo $id_tatuaje;?>" class="btn btn-danger text-white">
                                         Eliminar definitivamente
                                         </a>
                                        </div>
                                     </div> 
                                    </div>
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
<script src="../public/js/listados.js"></script>
<?php 
include('../../layout/parte2.php');
include('../../layout/mensaje.php');
?>
