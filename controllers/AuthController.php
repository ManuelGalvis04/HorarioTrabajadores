<?php
require_once '../models/User.php';
require_once '../helpers/MailHelper.php';

class AuthController {
    private $userModel;

    public function __construct() {
        $this->userModel = new User();
    }

    public function login($email, $password) {
        $user = $this->userModel->findUserByEmail($email);
        if ($user && password_verify($password, $user['password'])) {
            $_SESSION['user_id'] = $user['id'];
            header('Location: /appointment/schedule');
        } else {
            echo "Correo o contraseña incorrecta";
        }
    }

    public function recoverPassword($email) {
        $user = $this->userModel->findUserByEmail($email);
        if ($user) {
            $token = bin2hex(random_bytes(50));
            $resetLink = "http://yourdomain.com/reset_password.php?token=$token";
            MailHelper::sendMail($email, "Restablecer contraseña", "Haga clic en el siguiente enlace para restablecer su contraseña: $resetLink");
            echo "Revise su correo para el enlace de restablecimiento.";
        } else {
            echo "El correo no está registrado";
        }
    }
}
?>
