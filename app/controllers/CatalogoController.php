<?php
// app/controllers/CatalogoController.php
require_once __DIR__ . '/../models/Producto.php';

class CatalogoController {
    private $productoModel;

    public function __construct($pdo) {
        $this->productoModel = new Producto($pdo);
    }

    public function index() {
        // Capturar filtros desde GET
        $buscar    = $_GET['buscar']   ?? '';
        $categoria = $_GET['categoria'] ?? '';
        $orden     = $_GET['orden']     ?? '';

        // Obtener categorías para el select
        $categorias = $this->productoModel->obtenerCategorias();

        // Buscar productos con filtros
        $productos = $this->productoModel->buscarProductos($buscar, $categoria, $orden);

        // Título de la página
        $title = 'Catálogo';

        // Renderizar vista con datos
        renderView('catalogo', [
            'title'      => $title,
            'categorias' => $categorias,
            'productos'  => $productos,
            'buscar'     => $buscar,
            'categoria'  => $categoria,
            'orden'      => $orden
        ]);
    }
}