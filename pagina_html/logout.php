<?php
session_start();
// Destruir todas las variables de sesión.
$_SESSION = array();
// Si se desea destruir la sesión completamente, borra también la cookie de sesión.
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000,
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
    );
}
// Finalmente, destruye la sesión.
session_destroy();
header("Location: ../index.php");
exit();
?>
