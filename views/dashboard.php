<?php
session_start();
if (!isset($_SESSION["txtusername"])) {
    header('Location: index.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="menu">
        <h3>Welcome, <?php echo $_SESSION["txtusername"]; ?></h3>
        <ul>
            <li><a href="?opcion=inicio">Inicio</a></li>
            <li><a href="?opcion=ver">Ver</a></li>
            <li><a href="?opcion=ingresar">Ingresar</a></li>
            <li><a href="?opcion=modificar">Modificar</a></li>
            <li><a href="?opcion=eliminar">Eliminar</a></li>
            <li><a href="logout.php">Salir</a></li>
        </ul>
    </div>
</body>

</html>