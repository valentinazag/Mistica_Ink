<?php
include('../../../app/config.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") 
{

$titulo = $_POST['titulo'];
$descripcion = $_POST['descripcion'];

$nombreimagen = date('Y-m-d-h-is').$_FILES['imagen']['name'];
$location= "../../../public/images/".$nombreimagen;  
move_uploaded_file($_FILES['imagen']['tmp_name'], $location); 
$sentencia = $pdo->prepare('INSERT INTO tatuajes
(titulo,descripcion,imagen)
VALUES (:titulo,:descripcion,:imagen)');

$sentencia->bindParam(':titulo',$titulo);
$sentencia->bindParam(':descripcion',$descripcion);
$sentencia->bindParam(':imagen',$nombreimagen);


if ($sentencia->execute())
            {
                session_start();
                $_SESSION['mensaje'] = "Registro de tatuaje exitoso";
                $_SESSION['icono'] = "success";
             header('Location:'.$URL.'/admin/admin.php');
            }else{
                session_start();
                $_SESSION['mensaje'] = "Error al registrar tatuaje";
                $_SESSION['icono'] = "error";
                header('Location:'.$URL.'/admin/tatuajes/altas_t.php');
            }
}
?>