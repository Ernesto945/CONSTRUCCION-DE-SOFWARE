<?php

require_once $_SERVER["DOCUMENT_ROOT"] . '/etc/config.php';

class Conexion
{
    private $host;
    private $namedb;
    private $userdb;
    private $passwordb;
    private $charset;
    private $pdo;

    // Constructor method with environment-based database credentials
    public function __construct($host = '127.0.0.1', $namedb = 'dbsistema', $userdb = 'root', $passwordb = '', $charset = 'utf8')
    {
        $this->host = $host;
        $this->namedb = $namedb;
        $this->userdb = $userdb;
        $this->passwordb = $passwordb;
        $this->charset = $charset;

        // Connect to the database
        $this->conectar();
    }
    
    // Database connection method
    public function conectar()
    {
        $dns = "mysql:host={$this->host};dbname={$this->namedb};charset={$this->charset}";
        
        try {
            $this->pdo = new PDO($dns, $this->userdb, $this->passwordb);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            // Log the error to a file and show a user-friendly message
            error_log("Database connection error: " . $e->getMessage());
            die('Error al conectar a la base de datos. Por favor, intente más tarde.');
        }
    }

    // Method to retrieve the PDO connection instance
    public function obtenerConexion()
    {
        if ($this->pdo) {
            return $this->pdo;
        } 
    }

    // Method to get the DSN (Data Source Name)
    public function contesta()
    {
        return "mysql:host={$this->host};dbname={$this->namedb};charset={$this->charset}";
    }
}
?>
