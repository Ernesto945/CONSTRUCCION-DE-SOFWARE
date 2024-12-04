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
    $tmpdatusuarios = $_POST["datusuario"];
    
    // Sanitize input
    $tmpdatusuarios = htmlspecialchars($tmpdatusuarios);
    
    try {
        $sentencia = $pdo->prepare("DELETE FROM usuarios WHERE username = ?");
        $sentencia->execute([$tmpdatusuarios]);
        
        // Check if any row was affected
        if ($sentencia->rowCount() > 0) {
            echo "<p>User '$tmpdatusuarios' has been successfully deleted.</p>";
        } else {
            echo "<p>No user found with the username '$tmpdatusuarios'.</p>";
        }
        
        // Redirect after deletion
        header('Location: ' . get_UrlBase('dashboard.php')); // Adjust this to your desired page
        exit();
    } catch (PDOException $e) {
        // Log error and show a user-friendly message
        error_log($e->getMessage()); // Log the error for debugging
        echo "<p>There was an error deleting the user. Please try again later.</p>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eliminar Datos</title>
    <link rel="stylesheet" href="../css/styleseliminardatos.css">
</head>
<body>
    <div class="container">
        <h2>Eliminar Usuario</h2>
        <form action="" method="POST">
            <label for="datusuario">A quién desea eliminar:</label>
            <input type="text" name="datusuario" id="datsuario" required>
            <br>
            <button type="submit">Eliminar</button>
        </form>
    </div>
</body>
</html>
