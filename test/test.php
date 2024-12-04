<?php
// Start the session
session_start();

// Set session variables only if they are not already set
if (!isset($_SESSION["favcolor"])) {
    $_SESSION["favcolor"] = "green";
}
if (!isset($_SESSION["favanimal"])) {
    $_SESSION["favanimal"] = "cat";
}

// Notify the user that the session variables have been set
echo "Las variables ya han sido almacenadas .....";

// Redirect to 'vervariables.php' after a short delay
header("Refresh: 2; url=http://127.0.0.1/sistema/vervariables.php");
?>

<!DOCTYPE html>
<html>
<body>

<!-- Provide a link to view session variables -->
<br>
<a href="http://127.0.0.1/sistema/vervariables.php">Ir a ver las variables</a>

</body>
</html>
