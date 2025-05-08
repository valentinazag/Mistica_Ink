<?php
$sql = "SELECT * FROM tatuajes WHERE estado = 'activo' ";

$query = $pdo->prepare($sql);
$query->execute();

$tatuajes = $query->fetchAll(PDO::FETCH_ASSOC);

?>

