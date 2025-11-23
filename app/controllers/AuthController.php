<?php
require_once __DIR__ . '/../models/Usuario.php';

class AuthController {
    private $user;
    public function __construct(PDO $pdo) { $this->user = new Usuario($pdo); }

    public function login() {
        $error = null;
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $u = $this->user->autenticar($_POST['email'], $_POST['password']);
            if ($u) {
                session_start();
                $_SESSION['user'] = $u;
                header('Location: admin.php');
                exit;
            } else {
                $error = 'Credenciales inválidas';
            }
        }
        include __DIR__ . '/../views/admin/login.php';
    }

    public function logout() {
        session_start();
        session_destroy();
        header('Location: ../public/catalogo.php');
        exit;
    }
}
