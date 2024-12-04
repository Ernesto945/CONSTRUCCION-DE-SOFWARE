<?php
session_start();
session_unset(); // Elimina todas las variables de sesión
session_destroy(); // Destruye la sesión activa
session_regenerate_id(true); // Regenera el ID de sesión por seguridad

// Elimina cookies relacionadas con la sesión
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000,
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
    );
}

// Redirige al inicio de sesión con un mensaje de éxito
header('location: index.php?logout=success');
exit();
?>
