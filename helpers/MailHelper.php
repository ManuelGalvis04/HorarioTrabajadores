<?php
require_once 'PHPMailer/src/PHPMailer.php';
require_once 'PHPMailer/src/SMTP.php';
require_once 'PHPMailer/src/Exception.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class MailHelper {
    public static function sendMail($to, $subject, $body) {
        $mail = new PHPMailer(true);
        try {
            //Server settings
            $mail->isSMTP();
            $mail->Host = 'smtp.yourdomain.com'; // Cambia esto por el servidor SMTP que estés usando
            $mail->SMTPAuth = true;
            $mail->Username = 'your_email@yourdomain.com'; // Cambia esto por tu usuario de SMTP
            $mail->Password = 'your_email_password'; // Cambia esto por tu contraseña de SMTP
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port = 587;

            //Recipients
            $mail->setFrom('no-reply@yourdomain.com', 'Citas Médicas');
            $mail->addAddress($to);

            // Content
            $mail->isHTML(true);
            $mail->Subject = $subject;
            $mail->Body    = $body;

            $mail->send();
            echo 'Correo enviado correctamente';
        } catch (Exception $e) {
            echo "Error al enviar el correo: {$mail->ErrorInfo}";
        }
    }
}
?>
