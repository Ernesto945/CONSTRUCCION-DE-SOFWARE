<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/models/connect/conexion.php';

class modeloUsuario {
    private $conexion;

    public function __construct() {
        $this->conexion = Conexion::obtenerConexion();
    }

    public function validarCredenciales($username) {
        $query = "SELECT username, password FROM usuarios WHERE BINARY username = :username LIMIT 1";
        $stmt = $this->conexion->prepare($query);
        $stmt->bindParam(':username', $username, PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
?>
