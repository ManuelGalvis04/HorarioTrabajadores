<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once '../models/User.php';

class AuthController {
    public function login() {
        // Obtener los datos del formulario
        $email = $_POST['email'];
        $password = $_POST['password'];

        // Autenticar al usuario
        $user = User::authenticate($email, $password);

        if ($user) {
            // Iniciar sesión
            session_start();
            $_SESSION['user_id'] = $user->id;
            header("Location: ../views/appointment/schedule.html");
        } else {
            // Redirigir al login con un mensaje de error
            header("Location: ../views/auth/login.html?error=1");
        }
    }

    public function recoverPassword() {
        // Implementar la lógica para la recuperación de contraseña
    }
}
?>
