<?php
class Usuario {
    private $pdo;
    public function __construct(PDO $pdo) { $this->pdo = $pdo; }

    public function crear($nombre, $email, $password, $rol='user') {
        $hash = password_hash($password, PASSWORD_DEFAULT);
        $stmt = $this->pdo->prepare('INSERT INTO usuarios (nombre,email,password,rol) VALUES (:n,:e,:p,:r)');
        return $stmt->execute([':n'=>$nombre,':e'=>$email,':p'=>$hash,':r'=>$rol]);
    }

    public function autenticar($email, $password) {
        $stmt = $this->pdo->prepare('SELECT * FROM usuarios WHERE email = :e');
        $stmt->execute([':e'=>$email]);
        $u = $stmt->fetch();
        if ($u && password_verify($password, $u['password'])) return $u;
        return false;
    }
}
