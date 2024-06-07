<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once '../config/database.php';

class Appointment {
    public $date;
    public $time;

    public function save() {
        $db = Database::getInstance()->getConnection();
        $stmt = $db->prepare("INSERT INTO appointments (date, time) VALUES (:date, :time)");
        $stmt->execute(['date' => $this->date, 'time' => $this->time]);
    }
}
?>
