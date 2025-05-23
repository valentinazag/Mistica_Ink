<?php
include("../../config.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = trim($_POST['email']);
    $pw = $_POST['password'];

    $sql = "SELECT * FROM usuarios WHERE email = :email";
    $query = $pdo->prepare($sql);
    $query->bindParam(':email', $email, PDO::PARAM_STR);
    $query->execute();

    $usuario = $query->fetch(PDO::FETCH_ASSOC);

    if ($usuario && password_verify($pw, $usuario['password'])) {
        session_start();
        $_SESSION['sesion_email'] = $email;

        if ($usuario['cargo'] == "ADMINISTRADOR") {
            header('Location: '.$URL.'admin/admin.php');
        } else {
            header('Location: '.$URL.'pages/login/login.php');
        }
    } else {
        header('Location: '.$URL.'pages/login/login.php');
    }
}
?>
