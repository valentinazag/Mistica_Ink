<?php

include("../../../app/config.php");


$id_tatuaje = $_GET['id_tatuaje'];


    $sentencia = $pdo->prepare("DELETE FROM tatuajes WHERE id_tatuaje = '$id_tatuaje' "); 
            
            if ($sentencia->execute())
            {
                session_start();
                $_SESSION['mensaje'] = "Se elimino correctamente";
                $_SESSION['icono'] = "success";
             header('Location:'.$URL.'/admin/tatuajes/papelera_t.php');
            }else{
                session_start();
                $_SESSION['mensaje'] = "Error al eliminar el producto";
                $_SESSION['icono'] = "error";
                header('Location:'.$URL.'/admin/tatuajes/papelera_t.php');
        }

?>