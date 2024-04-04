<?php
//   http://localhost/crudrealstate/conexion.php -->
$servername="realstate.database.windows.net";
$database="realstate";
$username="Aprendiz";
$password="Andres2004";

    $con=  new mysqli("$servername", "$username", "$password", "$database");

    if($con -> connect_error ) {
        die("FALLA EN LA CONEXION " . $con -> connect_error) ; 
    }

?>
