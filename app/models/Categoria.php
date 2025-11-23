<?php
class Categoria {
    private $pdo;
    public function __construct(PDO $pdo) { $this->pdo = $pdo; }
    public function listar(){
        return $this->pdo->query('SELECT * FROM categorias ORDER BY nombre')->fetchAll();
    }
}
