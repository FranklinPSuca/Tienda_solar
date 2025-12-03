<?php
require_once __DIR__ . '/../models/Usuario.php';

class RegistroController {

    private $pdo;
    private $usuarioModel;

    public function __construct($pdo) {
        $this->pdo = $pdo;
        $this->usuarioModel = new Usuario($pdo);
    }

    public function index() {
        renderView('registro');
    }

    public function crear() {

        $nombre   = trim($_POST['nombre']);
        $email    = trim($_POST['email']);
        $password = trim($_POST['password']);

        $resultado = $this->usuarioModel->crear($nombre, $email, $password);

        if ($resultado === true) {
            header('Location: index.php?page=login&registro=ok');
            exit;
        }

        renderView('registro', ['error' => $resultado]);
    }
}
