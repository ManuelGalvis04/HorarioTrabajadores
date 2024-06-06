<?php
class Database {
    private static $instance = null;
    private $conn;

    private $host = 'localhost'; // Cambia esto si tu servidor de SQL Server está en otro host
    private $name = 'appointment_db'; // Nombre de la base de datos

    private function __construct() {
        $connectionOptions = array(
            "Database" => $this->name,
            "CharacterSet" => "UTF-8"
        );
        $this->conn = new PDO("sqlsrv:Server=$this->host;ConnectionPooling=0", null, null, array(
            PDO::SQLSRV_ATTR_ENCODING => PDO::SQLSRV_ENCODING_UTF8
        ));
        $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    public static function getInstance() {
        if (!self::$instance) {
            self::$instance = new Database();
        }
        return self::$instance;
    }

    public function getConnection() {
        return $this->conn;
    }
}
?>
