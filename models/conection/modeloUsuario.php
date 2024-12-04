<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/models/connect/conexion.php';

class ModeloUsuario {
    private $conexion;

    public function __construct() {
        $this->conexion = Conexion::obtenerConexion();
    }

    public function validarCredenciales($username, $password) {
        // Query to fetch the username and hashed password
        $query = "SELECT username, password FROM usuarios WHERE BINARY username = :username LIMIT 1";
        $stmt = $this->conexion->prepare($query);
        $stmt->bindParam(':username', $username, PDO::PARAM_STR);
        
        try {
            $stmt->execute();
            $user = $stmt->fetch(PDO::FETCH_ASSOC);
            
            if ($user) {
                // Compare the provided password with the hashed password in the database
                if (password_verify($password, $user['password'])) {
                    return true; // Credentials are valid
                } else {
                    return false; // Invalid password
                }
            } else {
                return false; // No user found with the given username
            }
        } catch (PDOException $e) {
            // Log the error for debugging (optional)
            error_log("Error validating credentials: " . $e->getMessage());
            return false; // Return false if there's an error
        }
    }
}
?>
