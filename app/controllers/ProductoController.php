<?php
require_once __DIR__ . '/../models/Producto.php';

class ProductoController {
    private $producto;
    public function __construct(PDO $pdo) { $this->producto = new Producto($pdo); }

    public function ver($id) {
        if (!$id) { header('Location: catalogo.php'); exit; }
        $p = $this->producto->obtener($id);
        include __DIR__ . '/../views/producto.php';
    }
}
