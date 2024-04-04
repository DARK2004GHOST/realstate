<?php
// Conexión a la base de datos
$servername = "localhost";
$database = "realstate";
$username = "root";
$password = "";

// Crear conexión
$con = new mysqli($servername, $username, $password, $database);

// Verificar la conexión
if ($con->connect_error) {
    die("FALLA EN LA CONEXION " . $con->connect_error);
}
?>
