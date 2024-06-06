<?php
class Appointment {
    private $db;

    public function __construct() {
        $this->db = Database::getInstance()->getConnection();
    }

    public function createAppointment($userId, $date, $time) {
        $query = "INSERT INTO appointments (user_id, date, time) VALUES (?, ?, ?)";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param("iss", $userId, $date, $time);
        return $stmt->execute();
    }

    public function getAppointmentsByDate($date) {
        $query = "SELECT * FROM appointments WHERE date = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param("s", $date);
        $stmt->execute();
        return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    }
}
?>
