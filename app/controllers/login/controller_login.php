<?php
include("../../config.php");
if ($_SERVER["REQUEST_METHOD"] == "POST") {
$email = $_POST['email'];
 $pw = $_POST['password'];

$sql = "SELECT * FROM usuarios WHERE email ='$email'";

$query = $pdo->prepare($sql);
$query->execute();

$usuarios = $query->fetchAll(PDO::FETCH_ASSOC);

$contador = 0;

foreach($usuarios as $usuario){
$contador = $contador +1;
$password_tabla = $usuario['password'];
}

$hash = $password_tabla;

if (($contador > 0) && (password_verify($pw,$hash)))
{
    if ($usuario['cargo'] == "ADMINISTRADOR" )
    {
        session_start();
     
        $_SESSION['sesion_email'] = $email;
    header('Location: '.$URL.'admin/admin.php');
    }
}else{
    echo "Error al iniciar sesión";

}
 
}
 
?>