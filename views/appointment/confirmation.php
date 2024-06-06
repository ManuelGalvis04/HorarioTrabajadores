<?php
// Verificar si el usuario está autenticado, de lo contrario redirigirlo al login
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: ../auth/login.php");
    exit();
}

// Obtener la información de la cita agendada (ejemplo)
$date = isset($_GET['date']) ? $_GET['date'] : '';
$time = isset($_GET['time']) ? $_GET['time'] : '';

// HTML de la página de confirmación
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmation</title>
</head>
<body>
    <h1>Appointment Confirmation</h1>
    <p>Your appointment has been scheduled successfully.</p>
    <p>Date: <?php echo $date; ?></p>
    <p>Time: <?php echo $time; ?></p>
    <a href="../public/index.php">Return to Home</a>
</body>
</html>
