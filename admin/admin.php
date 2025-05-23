<?php 
include('../app/config.php');
include('../layout/parte1.php');
include('../app/controllers/tatuajes/listado_tatu.php');

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
 header('Location: '.$URL.'pages/login/login.php');
}
?>
<style>
  .dataTables_wrapper label,
  .dataTables_wrapper .dataTables_info,
  .dataTables_wrapper .dataTables_paginate,
  .dataTables_wrapper .dataTables_length,
  .dataTables_wrapper .dataTables_filter {
    color: #000 !important;
  }

 
 
</style>
<section>   
    <div class="container-fluid"><h1></h1>  <br>
    <h2>Bienvenida <?php echo $nombre?>!</h2> 
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
                    <h3 class="card-title"><b>Tatuajes</b></h3> <div>   
                     <a href="tatuajes/altas_t.php" class="btn btn-success text-white">Nuevo tattoo</a>
                        <a href="tatuajes/papelera_t.php" class="btn btn-danger text-white">
                         Papelera
                    </a>
                </div>
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
                                    <a href="<?php echo $URL?>admin/tatuajes/update_t.php?id_tatuaje=<?php echo $id_tatuaje;?>" class="btn btn-success text-white">
                                        <i class="bi bi-pencil"></i> Editar
                                    </a>
                                    <a href="../app/controllers/tatuajes/estado/desactivar_tatu.php?id_tatuaje=<?php echo $id_tatuaje;?>" class="btn btn-danger text-white">
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

<script>
    $(function () {
        $("#example1").DataTable({
            "pageLength": 5,
            "language": {
                "emptyTable": "No hay información",
                "info": "Mostrando _START_ a _END_ de _TOTAL_ tatuajes",
                "infoEmpty": "Mostrando 0 a 0 de 0 tatuajes",
                "infoFiltered": "(Filtrado de MAX total tatuajes",
                "infoPostFix": "",
                "thousands": ",",
                "lengthMenu": "Mostrar _MENU_ tatuajes",
                "loadingRecords": "Cargando...",
                "processing": "Procesando...",
                "search": "Buscador:",
                "zeroRecords": "Sin resultados encontrados",
                "paginate": {
                    "first": "Primero",
                    "last": "Ultimo",
                    "next": "Siguiente",
                    "previous": "Anterior"
                }
            },
            "responsive": true, "lengthChange": true, "autoWidth": false,
            buttons: [
                {
                    extend: "collection",
                    text: "Reportes",
                    orientation: "landscape",
                    buttons: [
                        { text: "Copiar", extend: "copy"}, 
                        { extend: "pdf" }, 
                        { extend: "csv" }, 
                        { extend: "excel" }, 
                        { text: "Imprimir", extend: "print"}
                    ]
                },
                {
                    extend: "colvis",
                    text: "Visor de columnas",


                }
            ],
        }).buttons().container().appendTo("#example1_wrapper .col-md-6:eq(0)");
    });



$(document).ready(function() {
    $('#select_all').click(function() {
        $('.select-item').prop('checked', this.checked);
        toggleEliminarButton();
    });

    $('.select-item').change(function() {
        if ($('.select-item:checked').length == $('.select-item').length) {
            $('#select_all').prop('checked', true);
        } else {
            $('#select_all').prop('checked', false);
        }
        toggleEliminarButton();
    });

    function toggleEliminarButton() {
        if ($('.select-item:checked').length > 0) {
            $('#btnEliminarSeleccionados').show();
        } else {
            $('#btnEliminarSeleccionados').hide();
        }
    }

    $('#formEliminarSeleccionados').submit(function(e) {
        e.preventDefault();
        var selected = [];
        $('.select-item:checked').each(function() {
            selected.push($(this).val());
        });
        $('#ids_seleccionados').val(selected.join(','));
        this.submit();
    });
});

</script>
<?php 
include('../layout/parte2.php');
include('../layout/mensaje.php');
?>


