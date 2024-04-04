<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../codigo_css/style_login.css">
</head>
<body>
    <div class="containere">
        <!-- Imagen del logotipo -->
        <img src="../imagenes/LOGO JF cuadro.png" alt="">

        <!-- Encabezado de bienvenida -->
        <h2 class="welcome-heading"> INICIAR SESION
            <span class="dkp-heading"></span>
        </h2>
        
        <!-- Formulario de inicio de sesión -->
        <form action="../pagina_html/validar.php" method="post">
            <!-- Campo de entrada para el nombre de usuario -->
            <div class="input-group mb-3">
                <span class="input-group-text">
                    <i class="fa fa-user"></i>
            <input type="text" placeholder="Nombres" name="usuario" id="usuario" class="input-box" required>

            <!-- Campo de entrada para la contraseña -->
            <div style="position: relative;">
          
                <input type="password" placeholder="Contraseña" name="contraseña" id="contraseña" class="input-box" required>
            </div>
            
            <!-- Botón de inicio de sesión -->
            <button type="submit" class="login-btn boton">E N T R A R </button>
        </form>

        <!-- Contenedor de los enlaces adicionales -->
        <div class="links-container box">
            <!-- Enlace para recuperar contraseña -->
            <center><a href="../pagina_html/recuperar_contraseña.php" class="forget-password link">Recuperar contraseña</a><br>
            <!-- Enlace para registrar una nueva cuenta -->
            <a href="../pagina_html/crear_cuenta.php" class="register-now link">Crear Cuenta</a></center>
            <!-- Enlace para volver a la página de inicio -->
           
        </div>
    </div>
    
</body>
</html>
