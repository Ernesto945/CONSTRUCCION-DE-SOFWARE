<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Session Variables</title>
</head>

<body>
    <h2>Session Variables</h2>
    <?php
    if (isset($_SESSION["txtusername"])) {
        echo "Username: " . $_SESSION["txtusername"] . "<br>";
        echo "Password: " . $_SESSION["txtpassword"] . "<br>";
    } else {
        echo "No session variables set.";
    }
    ?>
    <br>
    <a href="index.php">Go to Login</a>
</body>

</html>
