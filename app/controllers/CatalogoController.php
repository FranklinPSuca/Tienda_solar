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
            'categoria_id' => $_GET['categoria'] ?? null,
            'q' => $_GET['q'] ?? null
        ];

        $productos  = $this->producto->listar($filtros);
        $categorias = $this->categoria->listar();

        include __DIR__ . '/../views/catalogo.php';
    }
}
