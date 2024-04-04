<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Registro</title>
    <!-- Agrega los enlaces a Bootstrap CSS y JS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-kmK5I3Fo5w5f5krZ5R5u1Cqz5pRbAUO9RkPrqer2fFt5f5z5D5F5f5f5f5f5f5f5f5f5" crossorigin="anonymous"></script>
    <!-- http://localhost/PAGINA_REALSTATE/crudregistros/index.php -->
</head>
<body>
    <?php
    // Incluye el archivo de conexión a la base de datos
    include 'conexion.php';

    // Verifica si se ha proporcionado un ID de cita válido
    if (isset($_GET['id'])) {
        $idCita = $_GET['id'];

        // Realiza la consulta para obtener los datos de la cita correspondiente al ID
        $consulta = "SELECT * FROM TBLCita WHERE IdCita = $idCita";
        $resultado = mysqli_query($con, $consulta);

        // Verifica si se encontró la cita
        if (mysqli_num_rows($resultado) === 1) {
            $cita = mysqli_fetch_assoc($resultado);
        } else {
            echo '<div class="alert alert-danger" role="alert">Cita no encontrada.</div>';
            exit;
        }
    } else {
        echo '<div class="alert alert-danger" role="alert">ID de cita no proporcionado.</div>';
        exit;
    }

    // Procesa la actualización 
    if (isset($_POST['actualizar'])) {
        $direccion_actualizada = $_POST['direccion'];
        $fecha_actualizada = $_POST['fecha'];
        $telefono_actualizado = $_POST['telefono'];
        $categoria_actualizada = $_POST['categoria'];
        $inmueble_actualizado = $_POST['inmueble']; // Nuevo campo para el ID del inmueble

        // Actualiza los datos en la base de datos
        $actualizar = "UPDATE TBLCita 
                      SET Dirección = '$direccion_actualizada', 
                          Fecha = '$fecha_actualizada', 
                          Telefono = '$telefono_actualizado', 
                          codigoc = '$categoria_actualizada',
                          infoinmueble = '$inmueble_actualizado' 
                      WHERE IdCita = $idCita";

        if (mysqli_query($con, $actualizar)) {
            echo '<div class="alert alert-success" role="alert">Cita actualizada correctamente.</div>';
        } else {
            echo '<div class="alert alert-danger" role="alert">Error al actualizar la cita: ' . mysqli_error($con) . '</div>';
        }
    }
    ?>

    <div class="container mt-4">
        <h1 class="text-center mb-4">Editar Cita</h1>
        <form action="" method="post">
            <div class="mb-3">
                <label for="direccion" class="form-label">Dirección</label>
                <input type="text" class="form-control" name="direccion" value="<?php echo $cita['Dirección']; ?>" required>
            </div>
            <div class="mb-3">
                <label for="fecha" class="form-label">Fecha</label>
                <input type="date" class="form-control" name="fecha" value="<?php echo $cita['Fecha']; ?>" required>
            </div>
            <div class="mb-3">
                <label for="telefono" class="form-label">Teléfono</label>
                <input type="text" class="form-control" name="telefono" value="<?php echo $cita['Telefono']; ?>" required>
            </div>
            <div>
               
