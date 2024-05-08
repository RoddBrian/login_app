<?php
$user = 'admin';
$password = 'PbwWtbnbBqxkTaB75KKH';
$server = 'db-reckonnt-of.cdzyvaae9voe.us-east-1.rds.amazonaws.com';
$database = 'RECKONNT_SYS';

$conexion = new mysqli($server, $user, $password, $database);

if ($conexion->connect_errno) {
    echo "Connect failed: %s\n", $conexion->connect_error;
    exit();
} 

$conexion->set_charset("utf8");
?>
