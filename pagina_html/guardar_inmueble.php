<?php
session_start();
include '../crudinmuebles/conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verificar si el usuario está autenticado
    if (isset($_SESSION['usuario'])) {
        $idUsuario = $_SESSION['usuario'];
        // Obtener el ID del inmueble enviado por la solicitud POST
        $idInmueble = $_POST['idInmueble'];
        
        // Verificar si el ID del inmueble existe en la base de datos antes de insertarlo como favorito
        $query = "SELECT id FROM TBLInmueble WHERE id = '$idInmueble'";
        $resultado = mysqli_query($con, $query);
        if (mysqli_num_rows($resultado) > 0) {
            // El ID del inmueble es válido, continuar con la inserción en la tabla de favoritos
            $queryInsert = "INSERT INTO favoritos (idUsuario, idInmueble) VALUES ('$idUsuario', '$idInmueble')";
            if (mysqli_query($con, $queryInsert)) {
                echo "Inmueble guardado como favorito";
            } else {
                echo "Error al guardar el inmueble como favorito: " . mysqli_error($con);
            }
        } else {
            // El ID del inmueble no existe en la base de datos
            echo "El ID del inmueble no es válido";
        }
    } else {
        // El usuario no está autenticado
        echo "Debes iniciar sesión para guardar inmuebles como favoritos";
    }
} else {
    // Acceso no autorizado
    echo "Acceso no autorizado";
}
?>
