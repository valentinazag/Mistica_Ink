<?php
$sql = "SELECT * FROM tatuajes
        WHERE id_tatuaje= '$id_tatuaje'";

$query = $pdo->prepare($sql);
$query->execute();

$tatuajes = $query->fetchAll(PDO::FETCH_ASSOC);

foreach($tatuajes as $tatuaje)
{
$titulo = $tatuaje['titulo'];
$descripcion = $tatuaje['descripcion'];
$imagen = $tatuaje['imagen'];
$estado = $tatuaje['estado'];
}
?>

