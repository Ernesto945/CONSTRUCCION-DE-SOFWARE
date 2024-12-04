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
$conecxion->conectar();
$pdo = $conecxion->obtenerconexion();

$query = $pdo->query("SELECT id, username, password, perfil FROM usuarios");

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ver Datos</title>
    <link rel="stylesheet" href="../css/stylesverdatos.css">
</head>
<body>
<div class="container">
        <h2>Lista de Usuarios del Sistema</h2>
        <table>
            <thead>
                <tr>
                    <th>ID</th> 
                    <th>Username</th>
                    <th>Password</th>
                    <th>Perfil</th>
                </tr>
            </thead>
            <tbody>
            <?php
            // Ejecutar consulta y mostrar los datos
            while ($fila = $query->fetch(PDO::FETCH_ASSOC)) {
                // Use htmlspecialchars to sanitize output
                $username = htmlspecialchars($fila['username']);
                $perfil = htmlspecialchars($fila['perfil']);
                $password = "*****"; // Mask the password (we don't want to show it)
            ?>
            <tr>
                <td><?php echo $fila['id']; ?></td>
                <td><?php echo $username; ?></td>
                <td><?php echo $password; ?></td>
                <td><?php echo $perfil; ?></td>
            </tr>
            <?php
            }
            ?>
            </tbody>
        </table>
    </div>
</body>
</html>
