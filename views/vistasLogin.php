<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/etc/config.php';

function vistaLogin($mensaje = '') {
    // Display the message if it's set
    if (!empty($mensaje)) {
        echo '<p class="error-message">' . htmlspecialchars($mensaje) . '</p>';
    } else {
        // Proceed with rendering the login form
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="robots" content="noindex, nofollow">
    <title>Login</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lilita+One&family=Lobster&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo htmlspecialchars(get_UrlBase('css/style-login.css')); ?>">
    <link rel="icon" href="<?php echo htmlspecialchars(get_UrlBase('pictures/user.svg')); ?>" type="image/svg+xml">
</head>
<body>
    <div class="loader-container" id="loader">
        <div class="loader"></div>
    </div>

    <div class="pictures">
        <!-- Images with links using dynamic paths -->
        <div class="picture-flower-2">
            <img src="<?php echo htmlspecialchars(get_UrlBase('pictures/flower-2.svg')); ?>" alt="Flower 2" height="70" width="70">
        </div>
        <!-- Additional images here... -->
    </div>

    <div class="login-container">
        <div class="icon-user">
            <img src="<?php echo htmlspecialchars(get_UrlBase('pictures/user.svg')); ?>" alt="User Icon" height="190" width="190">
        </div>

        <form action="/controllers/controladorLogin.php" method="POST" class="login-form" autocomplete="off">
            <h1 class="form-title">Ingreso de<br>Usuarios</h1>

            <div class="form-group form-username">
                <label for="txtusername">Username</label>
                <input type="text" name="txtusername" id="txtusername" placeholder="Ingresa tu usuario" required>
            </div>

            <div class="form-group form-password">
                <label for="txtpassword">Password</label>
                <input type="password" name="txtpassword" id="txtpassword" placeholder="Ingresa tu contraseña" required>
            </div>

            <div class="button-login">
                <input type="submit" value="Ingresar">
            </div>
        </form>

        <!-- More images/graphics... -->
        <div class="graphic">
            <img src="<?php echo htmlspecialchars(get_UrlBase('pictures/grafico-de-linea-1.svg')); ?>" alt="Graphic 1" height="100" width="100">
        </div>
        <div class="global">
            <img src="<?php echo htmlspecialchars(get_UrlBase('pictures/global.svg')); ?>" alt="Global" height="100" width="100">
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="<?php echo htmlspecialchars(get_UrlBase('js/loader.js')); ?>"></script>
</body>
</html>

<?php
    }
}
?>
