<?php
class User {
    private $db;

    public function __construct() {
        $this->db = Database::getInstance()->getConnection();
    }

    public function findUserByEmail($email) {
        $query = "SELECT * FROM users WHERE email = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }

    public function createUser($email, $password) {
        $hashedPassword = password_hash($password, PASSWORD_BCRYPT);
        $query = "INSERT INTO users (email, password) VALUES (?, ?)";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param("ss", $email, $hashedPassword);
        return $stmt->execute();
    }
}
?>
