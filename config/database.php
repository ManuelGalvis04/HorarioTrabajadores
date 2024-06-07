<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

class Database {
    // private static $instance = null;
    private $conn;

    private $host = 'localhost';
    private $name = 'appointment_db';

    private function __construct() {
        try {
            // Utilizar Windows Authentication (Integrated Security)
            $this->conn = new PDO("sqlsrv:Server=$this->host;Database=$this->name;ConnectionPooling=0", null, null);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }
    
}
?>
