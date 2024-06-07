<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once '../models/Appointment.php';
require_once '../helpers/MailHelper.php';

class AppointmentController {
    public function schedule() {
        // Obtener los datos del formulario
        $date = $_POST['date'];
        $time = $_POST['time'];

        // Guardar la cita en la base de datos
        $appointment = new Appointment();
        $appointment->date = $date;
        $appointment->time = $time;
        $appointment->save();

        // Enviar confirmación por correo electrónico
        MailHelper::sendMail($_SESSION['user_email'], 'Appointment Confirmation', 'Your appointment is confirmed.');

        // Redirigir a la página de confirmación
        header("Location: ../views/appointment/confirmation.html?date=$date&time=$time");
    }
}
?>
