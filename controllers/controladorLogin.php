<?php
session_start();

require_once $_SERVER['DOCUMENT_ROOT'] . '/views/vistaLogin.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/models/modeloUsuario.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/etc/config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $v_username = htmlspecialchars($_POST["txtusername"] ?? '');
    $v_password = htmlspecialchars($_POST["txtpassword"] ?? '');

    $modelousuario = new modeloUsuario();
    $user = $modelousuario->validarCredenciales($v_username);

    if ($user && password_verify($v_password, $user['password'])) {
        session_regenerate_id(true);
        $_SESSION["txtusername"] = $v_username;
        header('Location: ' . get_controllers('controladorDashboard.php'));
        exit;
    } else {
        $error = "Usuario o contraseña incorrectos.";
        vistaLogin($error); // Envía el mensaje de error al formulario
    }
} else {
    vistaLogin(); // Carga la vista de login
}
?>

