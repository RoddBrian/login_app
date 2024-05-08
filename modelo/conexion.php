<?php
$user = getenv('DB_USER');
$password = getenv('DB_PASS');
$server = getenv('DB_HOST');
$database = getenv('DB_NAME');

$conexion = new mysqli($server, $user, $password, $database);

if ($conexion->connect_errno) {
    printf("Connect failed: %s\n", $conexion->connect_error);
    exit();
}else{
    printf("Connect success");
}

$conexion->set_charset("utf8");
?>
