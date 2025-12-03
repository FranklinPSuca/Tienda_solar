<?php
class LoginController {

    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function index() {

        $return = $_GET['return'] ?? null;

        renderView('login/login', [
            'title' => 'Iniciar sesión',
            'return' => $return
        ]);
    }

    public function auth() {

        $email    = $_POST['email']    ?? '';
        $password = $_POST['password'] ?? '';
        $return   = $_POST['return']   ?? 'home';

        if ($email === '' || $password === '') {
            renderView('login/login', [
                'title' => 'Iniciar sesión',
                'error' => 'Complete los campos'
            ]);
            return;
        }

        $stmt = $this->pdo->prepare("SELECT id, email, password FROM usuarios WHERE email = ?");
        $stmt->execute([$email]);
        $user = $stmt->fetch();

        if (!$user || !password_verify($password, $user['password'])) {
            renderView('login/login', [
                'title' => 'Iniciar sesión',
                'error' => 'Usuario o contraseña incorrectos'
            ]);
            return;
        }

        // Guardar datos de sesión
            $_SESSION['usuario_id'] = $user['id'];
            $_SESSION['user']       = $user['email']; // o el nombre si lo tienes en la BD

            header("Location: index.php?page=$return");
            exit;
    }

    public function logout() {
        session_destroy();
        header("Location: index.php?page=home");
        exit;
    }

}
