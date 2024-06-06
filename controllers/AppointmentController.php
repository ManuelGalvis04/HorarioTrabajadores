<?php
require_once '../models/Appointment.php';
require_once '../helpers/MailHelper.php';

class AppointmentController {
    private $appointmentModel;

    public function __construct() {
        $this->appointmentModel = new Appointment();
    }

    public function schedule($userId, $dates, $times) {
        foreach ($dates as $date) {
            foreach ($times as $time) {
                $this->appointmentModel->createAppointment($userId, $date, $time);
            }
        }
        $doctorEmail = "doctor@example.com";
        MailHelper::sendMail($doctorEmail, "Nueva Cita Agendada", "Se ha agendado una nueva cita.");
        echo "Cita agendada y correo enviado al doctor.";
    }

    public function getAvailability($date) {
        $appointments = $this->appointmentModel->getAppointmentsByDate($date);
        // Lógica para filtrar disponibilidad basada en citas existentes
        return $appointments;
    }
}
?>
