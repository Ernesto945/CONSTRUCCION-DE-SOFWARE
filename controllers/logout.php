<?php
session_start();
session_unset();  // elimina todas las variables de sesión
session_destroy();  // destruye la sesión
header('location: index.php');  // redirige al login
exit();
