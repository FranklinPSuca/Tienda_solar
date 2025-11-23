<?php
require_once __DIR__ . '/../models/Carrito.php';

class CarritoController {
    private $carrito;
    public function __construct(PDO $pdo) { $this->carrito = new Carrito($pdo); }

    public function agregar() {
        $id = $_POST['producto_id'];
        $cantidad = $_POST['cantidad'] ?? 1;
        $this->carrito->agregar($id, $cantidad);
        header('Location: carrito.php');
        exit;
    }

    public function ver() {
        $items = $this->carrito->listar();
        include __DIR__ . '/../views/carrito.php';
    }
    public function vaciar() {
        $this->carrito->vaciar();
        header('Location: carrito.php');
        exit;
    }
}
