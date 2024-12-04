<?php
session_start();

// Redirect to login page if user is not logged in
if (!isset($_SESSION["txtusername"])) {
    header('Location: index.php');
    exit();
}

// Optionally, you can check for user roles here and modify the menu accordingly
// For example:
// if ($_SESSION["role"] === 'admin') {
//     // Show additional admin options
// }
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
        <h3>Welcome, <?php echo htmlspecialchars($_SESSION["txtusername"]); ?></h3>
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
