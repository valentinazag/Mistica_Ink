<?php
include("../../../config.php");

$ids_seleccionados = $_POST['ids_seleccionados'];
$array_ids = explode(',', $ids_seleccionados);

$estado = "desactivado";

foreach($array_ids as $id_tatuaje) {
    $sentencia = $pdo->prepare("UPDATE tatuajes SET estado = :estado WHERE id_tatuaje = :id_tatuaje");
    $sentencia->bindParam(':estado', $estado);
    $sentencia->bindParam(':id_tatuaje', $id_tatuaje);
    $sentencia->execute();
}

session_start();
$_SESSION['mensaje'] = "Tatuajes enviados a la papelera exitosamente";
$_SESSION['icono'] = "success";
header('Location: '.$URL.'/admin/admin.php');
?>