<?php
session_start();
require_once '../config/database.php';
require_once '../controllers/AuthController.php';
require_once '../controllers/AppointmentController.php';

$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

if ($uri == '/login' && $_SERVER['REQUEST_METHOD'] == 'POST') {
    $authController = new AuthController();
    $authController->login($_POST['email'], $_POST['password']);
} elseif ($uri == '/recover' && $_SERVER['REQUEST_METHOD'] == 'POST') {
    $authController = new AuthController();
    $authController->recoverPassword($_POST['email']);
} elseif ($uri == '/appointment/schedule' && $_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_SESSION['user_id'])) {
        $appointmentController = new AppointmentController();
        $appointmentController->schedule($_SESSION['user_id'], $_POST['dates'], $_POST['time']);
    } else {
        echo "Debe iniciar sesión para agendar una cita";
    }
} else {
    echo "Página no encontrada";
}
?>
