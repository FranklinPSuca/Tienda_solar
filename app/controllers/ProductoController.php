<?php
// app/controllers/ProductoController.php
require_once __DIR__ . '/../models/Producto.php';

class ProductoController {
    private $productoModel;

    public function __construct($pdo) {
        $this->productoModel = new Producto($pdo);
    }

    /**
     * Mostrar detalle de un producto por ID
     */
    public function detalle($id) {
        if (!$id) {
            die("❌ Producto no especificado.");
        }

        // Obtener producto desde el modelo
        $p = $this->productoModel->obtenerPorId($id);

        if (!$p) {
            die("❌ Producto no encontrado.");
        }

        // Renderizar vista con datos
        renderView('producto', [
            'title' => $p['nombre'],
            'p'     => $p
        ]);
    }

    /**
     * (Opcional) Listar todos los productos
     */
    public function index() {
        $productos = $this->productoModel->obtenerTodos();
        renderView('catalogo', [
            'title'     => 'Catálogo',
            'productos' => $productos
        ]);
    }
}