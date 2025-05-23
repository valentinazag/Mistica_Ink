<?php
$URL= "http://localhost/documents/mistica/";

define('APP_NAME','mistica_ink');
define('SERVIDOR','localhost');
define('USUARIO','root');  
define('PASSWORD',''); 
define('BD','tattoo'); 

$servidor= "mysql:dbname=".BD.";host:".SERVIDOR;

try {
    $pdo = new PDO($servidor,USUARIO,PASSWORD,array(PDO::MYSQL_ATTR_INIT_COMMAND=>"SET NAMES utf8"));
} catch (PDOException $e) {
    print_r($e);
    echo "No se ha podido conectar a la BD";
}

?>