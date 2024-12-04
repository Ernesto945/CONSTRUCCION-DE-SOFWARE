<?php
session_start();

// Eliminar todas las variables de sesión
session_unset();

// Destruir la sesión
session_destroy();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Borrar Variables</title>
    <link rel="stylesheet" href="style.css">
    <script>
        setTimeout(function() {
            window.location.href = '/sistema/login.php'; // Redirige a login después de 3 segundos
        }, 3000);
    </script>
</head>
<body>
    <div class="container">
        <h1>Se borraron todas las variables</h1>
        <p>Las variables de sesión se han eliminado y la sesión se ha destruido.</p>
        <p>Serás redirigido al inicio en 3 segundos...</p>
    </div>
</body>
</html>
