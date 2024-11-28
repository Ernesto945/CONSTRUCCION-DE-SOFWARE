<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/views/vistaDashboard.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/etc/config.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/models/modeloUsuario.php';

session_start();

if (!isset($_SESSION["txtusername"])) {
    header('Location: ' . get_UrlBase('index.php'));
    exit;
}

function get_dashboard_content($opcion) {
    switch ($opcion) {
        case 'Inicio':
            return "<h3>Bienvenido al Sistema</h3>";
        case 'Ver':
            return "<h3>Ver</h3><p><iframe src='" . get_controllers("controladorUsuario.php") . "'></iframe></p>";
        case 'Ingresar':
            return "<h3>Ingresar</h3><p><iframe src='" . get_controllers("controladorIngresarUsuario.php") . "'></iframe></p>";
        case 'Modificar':
            return "<h3>Modificar</h3><p><iframe src='" . get_controllers("controladorModificarUsuario.php") . "'></iframe></p>";
        case 'Eliminar':
            return "<h3>Eliminar</h3><p><iframe src='" . get_controllers("controladorEliminarUsuario.php") . "'></iframe></p>";
    }
}
?>