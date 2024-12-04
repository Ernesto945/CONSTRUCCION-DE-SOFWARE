<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION["txtusername"])) {
    header('Location: ' . get_UrlBase('index.php'));
    exit();
}

require_once $_SERVER["DOCUMENT_ROOT"] . '/etc/config.php';
require_once $_SERVER["DOCUMENT_ROOT"] . '/models/connect/conexion.php';

global $host, $namedb, $userdb, $passwordb;
$conecxion = new conexion($host, $namedb, $userdb, $passwordb);
$pdo = $conecxion->obtenerconexion();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize inputs to prevent XSS
    $tmpdatusuarios = htmlspecialchars($_POST["datusuario"]);
    $tmpdatpassword = $_POST["datpassword"];
    $tmpdatperfil = htmlspecialchars($_POST["datperfil"]);
    
    // Hash the password for secure storage
    $hashedPassword = password_hash($tmpdatpassword, PASSWORD_DEFAULT);
    
    try {
        // Prepare and execute SQL statement
        $sentencia = $pdo->prepare("INSERT INTO usuarios(username, password, perfil) VALUES (?, ?, ?)");
        $sentencia->execute([$tmpdatusuarios, $hashedPassword, $tmpdatperfil]);
        
        // Redirect after success to avoid resubmission
        header('Location: ' . get_UrlBase('dashboard.php')); // Adjust the redirection as necessary
        exit();
        
    } catch (PDOException $e) {
        // Log error and show user-friendly message
        error_log($e->getMessage());  // Log the detailed error
        echo "<p>There was an error while inserting the user. Please try again later.</p>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ingresar Datos</title>
    <link rel="stylesheet" href="../css/stylesingresardatos.css">
</head>
<body>
    <div class="container">
        <h2>Ingresar Usuario</h2>
        <form action="" method="POST">
            <label for="datusuario">Usuario</label>
            <input type="text" name="datusuario" id="datusuario" required>

            <label for="datpassword">Password</label>
            <input type="password" name="datpassword" id="datpassword" required>

            <label for="datperfil">Perfil</label>
            <input type="text" name="datperfil" id="datperfil" required>

            <button type="submit">Ingresar Usuario</button>
        </form>
    </div>
</body>
</html>
