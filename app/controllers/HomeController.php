<?php
require_once __DIR__ . '/../models/Producto.php';

class HomeController {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function index() {
        renderView('home', []);
    }
}
