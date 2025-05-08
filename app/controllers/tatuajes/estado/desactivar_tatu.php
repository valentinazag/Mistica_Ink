<?php

include('../../../config.php');

$id_producto = $_GET['id_tatuaje'];
$estado = "desactivado";


$sentencia = $pdo->prepare("UPDATE tatuajes 
SET estado =:estado
WHERE id_tatuaje=:id_tatuaje");
$sentencia->bindParam(':estado', $estado);
$sentencia->bindParam(':id_tatuaje', $id_tatuaje);


if($sentencia->execute())
        {
            session_start();
            $_SESSION['mensaje'] = "Tatuajes eliminado exitosamente";
            $_SESSION['icono'] = "success";
            header('Location:'.$URL.'/admin/admin.php');
        }
    else
        {
            session_start();
            $_SESSION['mensaje'] = "Error al eliminar ";
            $_SESSION['icono'] = "error";
            header('Location:'.$URL.'/admin/tatuajes/papelera_t.php');
        }










?>