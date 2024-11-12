<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <link rel="stylesheet" href="style.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>

<body>
    <?php
    session_start();
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $v_username = $_POST["txtusername"] ?? "";
        $v_password = $_POST["txtpassword"] ?? "";

        if ($v_username == "admin" && $v_password == "1234") {
            $_SESSION["txtusername"] = $v_username;
            $_SESSION["txtpassword"] = $v_password;
            header('Location: dashboard.php');
            exit();
        } else {
            header('Location: claveequivocada.php');
            exit();
        }
    }

    if (isset($_SESSION["txtusername"])) {
        header('Location: dashboard.php');
        exit();
    }
    ?>

    <div class="wrapper">
        <form action="" method="POST">
            <h1>Login</h1>
            <div class="input-box">
                <input type="text" name="txtusername" placeholder="Username" required>
                <i class='bx bxs-user'></i>
            </div>
            <div class="input-box">
                <input type="password" name="txtpassword" placeholder="Password" required>
                <i class='bx bxs-lock-alt'></i>
            </div>
            <div class="remember-forgot">
                <label><input type="checkbox"> Remember</label>
                <a href="#">Forgot Password?</a>
            </div>
            <button type="submit" class="btn">Log In</button>
            <div class="register-link">
                <p>Not registered? <a href="#">Register</a></p>
            </div>
        </form>
    </div>
</body>

</html>

