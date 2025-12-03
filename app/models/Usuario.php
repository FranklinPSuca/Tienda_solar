<?php

class Usuario {
    private $pdo;

    public function __construct($pdo){
        $this->pdo = $pdo;
    }

    public function crear($nombre, $email, $password){

        // Validar email existente
        $stmt = $this->pdo->prepare("SELECT id FROM usuarios WHERE email = ?");
        $stmt->execute([$email]);

        if ($stmt->fetch()) {
            return "El correo ya está registrado";
        }

        // Password hashed
        $hash = password_hash($password, PASSWORD_BCRYPT);

        $sql = "INSERT INTO usuarios(nombre, email, password, rol, creado_en)
                VALUES (?, ?, ?, 'cliente', NOW())";

        $stmt = $this->pdo->prepare($sql);

        if($stmt->execute([$nombre, $email, $hash])){
            return true;
        }

        return "Error al registrar usuario";
    }
}
