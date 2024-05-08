<?php
// $user = getenv('DB_USER');
// $password = getenv('DB_PASS');
// $server = getenv('DB_HOST');
// $database = getenv('DB_NAME');

$user = 'admin';
$password = 'PbwWtbnbBqxkTaB75KKH';
$server = 'db-reckonnt-of.cdzyvaae9voe.us-east-1.rds.amazonaws.com';
$database = 'RECKONNT_SYS';

// $conexion = new mysqli($server, $user, $password, $database);

// if ($conexion->connect_errno) {
//     printf("Connect failed: %s\n", $conexion->connect_error);
echo 'Success test'.$user.$password.$server.$database;
//     exit();
// } 
// else {
//     printf("Connected");
// }

// $conexion->set_charset("utf8");
?>
