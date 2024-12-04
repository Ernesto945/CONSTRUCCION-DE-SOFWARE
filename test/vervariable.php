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
        echo "Username: " . htmlspecialchars($_SESSION["txtusername"]) . "<br>";
        echo "Password: ******<br>";  // Masking the password for security
    } else {
        echo "No session variables set.";
    }
    ?>
    <br>
    <a href="index.php">Go to Login</a>

    <!-- Option to logout and clear session -->
    <br>
    <a href="logout.php">Logout and Clear Session</a>
</body>

</html>
