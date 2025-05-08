<?php
include("../../../../app/config.php");

$ids_seleccionados = $_POST['ids_seleccionados'];
$array_ids = explode(',', $ids_seleccionados);

foreach($array_ids as $id_tatuaje) {
    $sentencia = $pdo->prepare("DELETE FROM tatuajes WHERE id_tatuaje = :id_tatuaje");
    $sentencia->bindParam(':id_tatuaje', $id_tatuaje);
    $sentencia->execute();
}

session_start();
$_SESSION['mensaje'] = "Tatuajes eliminados definitivamente.";
$_SESSION['icono'] = "success";

header('Location: '.$URL.'/admin/tatuajes/papelera_t.php');
exit;
?>