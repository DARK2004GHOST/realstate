<?php
include '../crudinmuebles/conexion.php';

session_start();
// Comprueba si el usuario y rol están seteados en la sesión
if (isset($_SESSION['usuario']) && isset($_SESSION['rol'])) {
    $usuario = $_SESSION['usuario'];
    $rol = $_SESSION['rol'];
} else {
    // Redirigir al usuario a la página de login si no hay datos de sesión
    header("location: login.php");
    exit();
}
// Consulta de los datos específicos de la tabla TBLInmueble
$consultaDatos = "SELECT  TBLInmueble.Precio, TBLInmueble.Localidad, TBLInmueble.Baños, TBLInmueble.Habitaciones, TBLInmueble.NumeroPisos
                  FROM TBLInmueble 
                  INNER JOIN TBLCategoria ON TBLInmueble.codigoc = TBLCategoria.IdCategoria";

// Verificar si se han enviado parámetros de búsqueda
if (isset($_GET['location']) || isset($_GET['price']) || isset($_GET['category'])) {
    $consultaDatos .= " WHERE 1"; // Iniciar la condición WHERE

    // Verificar si se ha seleccionado una ubicación
    if (isset($_GET['location']) && !empty($_GET['location'])) {
        // Filtrar por la ubicación seleccionada
        $ubicacion = mysqli_real_escape_string($con, $_GET['location']);
        $consultaDatos .= " AND TBLInmueble.Localidad LIKE '%$ubicacion%'";
    }

    // Verificar si se ha seleccionado un precio máximo
    if (isset($_GET['price']) && !empty($_GET['price'])) {
        // Filtrar por el precio máximo seleccionado
        $precioMaximo = mysqli_real_escape_string($con, $_GET['price']);
        $consultaDatos .= " AND TBLInmueble.Precio <= $precioMaximo";
    }

    // Filtrar por categoría si se proporciona
    if (isset($_GET['category'])) {
        $categoriaSeleccionada = mysqli_real_escape_string($con, $_GET['category']);
        $consultaDatos .= " AND TBLCategoria.Nombres = '{$categoriaSeleccionada}'";
    }
}
// Asegúrate de verificar si estas claves existen para evitar errores
$usuario = isset($_SESSION['usuario']) ? $_SESSION['usuario'] : 'Invitado';
$rol = isset($_SESSION['rol']) ? $_SESSION['rol'] : 'Sin rol';
// Ejecutar la consulta
$resultadoInmuebles = mysqli_query($con, $consultaDatos) or die("Problemas en el select:" . mysqli_error($con));

?>





<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>INMOBILIARIA JF</title>
    <link rel="stylesheet" type="text/css" href="../codigo_css/pag.css">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <!-- link de los iconos de bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">

    <!-- Google Fonts link -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lilita+One&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Mina&display=swap" rel="stylesheet">



    <style>
        /* estilos boton de guardado de las tarjetas de guarddar inmueble */
        .favorite {
            background-color: transparent;
            border: none;
            cursor: pointer;
            padding: 5px;
            margin-right: 10px;
        }

        .favorite:hover {
            background-color: #f0f0f0;
            border-radius: 5px;
        }

        .bookmark,
        .bookmark-fill {
            font-size: 1.5rem;
            /* Tamaño del icono en píxeles */
        }

        .bookmark {
            display: inline;
        }

        .bookmark.active {
            display: none;
        }

        .bookmark-fill {
            display: none;
            color: rgb(83, 170, 241);
            /* Color amarillo */
        }

        .bookmark-fill.active {
            display: inline;
        }
    </style>


</head>

<body>

    <header>
        <!-- Barra de navegacion -->
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                <a class="navbar-brand">
                    <span style="font-size: 25px;  margin-left: 1px;">
                        <?php echo "Bienvenido, " . $usuario; ?>

                        <span style="color: black; font-size: 15px; margin-left: 10px;">
                            <?php echo " (" . $rol . ")"; ?>
                        </span>

                    </span>
                </a>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto d-flex align-items-center">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="../pagina_html/entrar_admin.php">Inicio</a>
                        </li>
                        <li class="nav-item mr-1">
                            <a class="nav-link" href="#ofertas-inmuebles">Inmuebles</a>
                        </li>
                        <li class="nav-item mr-1">
                            <a class="nav-link" href="#sugerencias-caja-inmobiliaria">Sugerencias</a>
                        </li>

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Añadir
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="../crudusuarios/index.php">Añadir Usuarios</a></li>
                                <li><a class="dropdown-item" href="../crudcitas/index.php">Añadir Cita</a></li>
                                <li><a class="dropdown-item" href="../crudinmuebles/index.php">Añadir Inmueble</a></li>
                            </ul>
                        </li>


                        <li class="nav-item dropdown">
                            <div class="nav-link dropdown-toggle" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                                <img src="../imagenes/LOGOJF.png" width="30" height="30" class="rounded-circle" alt="Logo de la página web"> <!-- Logo de la página web en un círculo -->
                            </div>
                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuLink">
                                <li> <a class="nav-link" href="../pagina_html/guardados_usuario.php">Mis Guardados</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li>
                                    <a class="dropdown-item" href="../pagina_html/logout.php">
                                        Cerrar sesión
                                    </a>
                                </li>
                            </ul>
                        </li>

                        </li>

                    </ul>
                    </li>

                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <!-- fin de la barra de navegacion -->




    <br>
    <!-- aca comienza la seccion de las tarejetas que muestran algunas casas en oferta y su informacion -->
    <br>
    <section class="container" id="tarjetasSection">
        <div class="text-center">
            <h1 id="ofertas-inmuebles" class="tipo-letra">OFERTAS DE INMUEBLES</h1>
            <hr class="mx-auto" style="width: 21%;">
        </div>
        <div class="row row-cols-1 row-cols-md-3 g-4 container justify-content-center">
            <?php
            // Consulta para obtener los resultados de la base de datos
            $resultadoInmuebles = mysqli_query($con, "SELECT * FROM tblinmueble") or die("Problemas con el select" . mysqli_error($con));

            if ($resultadoInmuebles->num_rows > 0) {
                while ($reg = $resultadoInmuebles->fetch_assoc()) {
                    // Consulta para obtener la ruta de la imagen del inmueble
                    $idInmueble = $reg['IdInmueble'];
                    $consulta_imagen = "SELECT RutaImagen FROM imagenesinmuebles WHERE IdInmueble = $idInmueble LIMIT 1";
                    $resultado_imagen = mysqli_query($con, $consulta_imagen);

                    // Verifica si se encontró la imagen
                    if ($row_imagen = mysqli_fetch_assoc($resultado_imagen)) {
                        $ruta_imagen = $row_imagen['RutaImagen'];
            ?>
                        <div class="col">
                            <div class="card h-100">
                                <!-- Mostrar la miniatura de la imagen dentro de la tarjeta -->
                                <img src="http://localhost:8081/login/crudinmuebles/<?= $ruta_imagen ?>" alt="Miniatura de Inmueble" style="max-width: 100%; max-height: 200px;">
                                <div class="card-body">
                                    <h5 class="card-title">$<?= number_format($reg['Precio']); ?> COP <button class="favorite" onclick="toggleBookmark(<?= $idInmueble ?>)">
                                            <i class="bi bi-bookmark bookmark bookmark-<?= $idInmueble ?>"></i>
                                            <i class="bi bi-bookmark-fill bookmark-fill bookmark-fill-<?= $idInmueble ?>"></i>
                                        </button>

                                        <script>
                                            function toggleBookmark(idInmueble) {
                                                var bookmark = document.querySelector(".bookmark-" + idInmueble);
                                                var bookmarkFill = document.querySelector(".bookmark-fill-" + idInmueble);

                                                // Toggle classes to show/hide bookmarks
                                                bookmark.classList.toggle("active");
                                                bookmarkFill.classList.toggle("active");
                                            }
                                        </script>
                                    </h5>
                                    <p class="card-text">
                                        <?= isset($reg['Habitaciones']) ? $reg['Habitaciones'] . ' Habitaciones - ' : '' ?>
                                        <?= isset($reg['Baños']) ? $reg['Baños'] . ' Baños - ' : '' ?>
                                        <?= isset($reg['NumeroPisos']) ? $reg['NumeroPisos'] . ' Pisos' : '' ?>
                                    </p>
                                    <p class="card-text"><?= $reg['Localidad']; ?></p>
                                    <a href="../crudinmuebles/interfazinmuebles.php?id=<?= $reg['IdInmueble'] ?>" class="btn btn-dark">Más Detalles</a>
                                </div>
                            </div>
                        </div>
                    <?php
                    } else {
                        // Si no se encontró la imagen, muestra un mensaje de error o una imagen de marcador de posición
                    ?>
                        <div class="col">
                            <div class="card h-100">
                                <!-- Mostrar una imagen de marcador de posición o un mensaje de error -->
                                <p class="text-center">No hay imagen disponible</p>
                                <div class="card-body">
                                    <h5 class="card-title">$<?= number_format($reg['Precio']); ?> COP <div class="container-buttons-card">
                                            <div class="container-buttons-card">
                                                <button class="favorite" onclick="toggleBookmark()">
                                                    <i class="bi bi-bookmark" id="bookmark"></i>
                                                    <i class="bi bi-bookmark-fill" id="bookmark-fill"></i>
                                                </button>
                                            </div>
                                        </div>



                                        <script>
                                            function toggleBookmark() {
                                                var bookmark = document.getElementById("bookmark");
                                                var bookmarkFill = document.getElementById("bookmark-fill");

                                                // Toggle classes to show/hide bookmarks
                                                bookmark.classList.toggle("active");
                                                bookmarkFill.classList.toggle("active");
                                            }
                                        </script>



                                    </h5>
                                    <p class="card-text">
                                        <?= isset($reg['Habitaciones']) ? $reg['Habitaciones'] . ' Habitaciones - ' : '' ?>
                                        <?= isset($reg['Baños']) ? $reg['Baños'] . ' Baños - ' : '' ?>
                                        <?= isset($reg['NumeroPisos']) ? $reg['NumeroPisos'] . ' Pisos' : '' ?>
                                    </p>
                                    <p class="card-text"><?= $reg['Localidad']; ?></p>
                                    <a href="../crudinmuebles/interfazinmuebles.php?id=<?= $reg['IdInmueble'] ?>" class="btn btn-dark">Más Detalles</a>
                                </div>
                            </div>
                        </div>
            <?php
                    }
                }
            } else {
                echo '<p class="text-center">No hay inmuebles registrados.</p>';
            }
            ?>
        </div>
        <div class="d-flex justify-content-center">
            <button id="verMasBtn" class="btn btn-info" style="width: 180px;">
                Ver más
                <i class="bi bi-chevron-down ms-2"></i>
            </button>
            <br>

            <button id="ocultarBtn" class="btn btn-info " style="width: 180px;" style="display: none;">
                Ocultar
                <i class="bi bi-chevron-down ms-2"></i>
            </button>
        </div>



    </section>

