<?php
session_start();

require_once $_SERVER['DOCUMENT_ROOT'] . '/views/vistaLogin.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/models/modeloUsuario.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/etc/config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

  $v_username = $_POST["txtusername"] ?? '';
  $v_password = $_POST["txtpassword"] ?? '';

  $modelousuario = new modeloUsuario();
  $user = $modelousuario->validarCredenciales($v_username);

  if ($user && $v_password === $user['password']) {
      $_SESSION["txtusername"] = $v_username;
      header('Location: ' . get_controllers('controladorDashboard.php'));
      exit;
  } else {
      header('Location: ' . get_views('claveequivocada.php'));
      exit;
  }
} else {
vistaLogin();
}
?>
