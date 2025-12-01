<?php
require_once __DIR__ . '/../models/Producto.php';
require_once __DIR__ . '/../models/Categoria.php';

class CatalogoController {
    private $producto;
    private $categoria;

    public function __construct(PDO $pdo) {
        $this->producto  = new Producto($pdo);
        $this->categoria = new Categoria($pdo);
    }

    public function index() {
        $filtros = [
    'q' => $_GET['q'] ?? '',
    'categoria_id' => $_GET['categoria'] ?? ''
];
$productos = $this->producto->listar($filtros);
$categorias = $this->categoria->listar();

include __DIR__ . '/../views/catalogo.php';
    }
}
