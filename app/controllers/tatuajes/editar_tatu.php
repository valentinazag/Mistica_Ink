<?php
include("../../../app/config.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
$id_tatuaje = $_POST['id_tatuaje'];
$titulo = $_POST['titulo'];
$descripcion = $_POST['descripcion'];

if($_FILES['imagen']['name'] != null){
$nombreimagen = date('Y-m-d-h-is').$_FILES['imagen']['name'];
$location= "../../../public/images/".$nombreimagen; 
move_uploaded_file($_FILES['imagen']['tmp_name'], $location); 
$imagen = $nombreimagen;
} else {
    $consulta = $pdo->prepare("SELECT imagen FROM tatuajes WHERE id_tatuaje = :id_tatuaje");
    $consulta->bindParam(':id_tatuaje', $id_tatuaje);
    $consulta->execute();
    $fila = $consulta->fetch(PDO::FETCH_ASSOC);
    $imagen = $fila['imagen']; 
}



$sentencia = $pdo->prepare("UPDATE tatuajes 
SET titulo=:titulo,
descripcion=:descripcion,
imagen=:imagen
WHERE id_tatuaje=:id_tatuaje");
$sentencia->bindParam(':titulo', $titulo);
$sentencia->bindParam(':descripcion', $descripcion);
$sentencia->bindParam(':imagen', $imagen);
$sentencia->bindParam(':id_tatuaje', $id_tatuaje);

if($sentencia->execute())
        {
            session_start();
            $_SESSION['mensaje'] = "Actualización de tatuaje exitosa";
            $_SESSION['icono'] = "success";
            header('Location:'.$URL.'/admin/admin.php?id_tatuaje='.$id_tatuaje);
        }
    else
        {
            session_start();
            $_SESSION['mensaje'] = "Error al actualizar ";
            $_SESSION['icono'] = "error";
            header('Location:'.$URL.'/admin/admin.php?id_tatuaje='.$id_tatuaje);
        }
}


?>