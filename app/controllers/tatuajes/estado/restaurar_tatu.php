<?php

include('../../../config.php');



$id_producto = $_GET['id_tatuaje'];
$estado = "activo";

$sentencia = $pdo->prepare("UPDATE tatuajes 
SET estado =:estado
WHERE id_tatuaje=:id_tatuaje");
$sentencia->bindParam(':estado', $estado);
$sentencia->bindParam(':id_tatuaje', $id_tatuaje);


if($sentencia->execute())
        {
            session_start();
            $_SESSION['mensaje'] = "Restauracion de tatuajes exitosa";
            $_SESSION['icono'] = "success";
            header('Location:'.$URL.'/admin/tatuajes/papelera_t.php');
        }
    else
        {
            session_start();
            $_SESSION['mensaje'] = "Error al restaurar ";
            $_SESSION['icono'] = "error";
            header('Location:'.$URL.'/admin/tatuajes/papelera_t.php');
        }



?>