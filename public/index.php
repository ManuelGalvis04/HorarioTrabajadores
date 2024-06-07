<?php
// Redirigir al login si no está autenticado
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: ../views/auth/login.html");
    exit();
}

// Si está autenticado, redirigir a la página de agendamiento
header("Location: ../views/appointment/schedule.html");
?>
