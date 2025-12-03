<?php
// app/controllers/CarritoController.php

require_once __DIR__ . '/../models/Producto.php';
require_once __DIR__ . '/../helpers/auth.php';


class CarritoController {

    private $productoModel;

    public function __construct(PDO $pdo) {
        $this->productoModel = new Producto($pdo);

        if (!isset($_SESSION['carrito'])) {
            $_SESSION['carrito'] = [];
        }
    }

    public function index() {
        $items = $_SESSION['carrito'];

        renderView('carrito', [
            'title' => 'Carrito de Compras',
            'items' => $items
        ]);
    }

    /** ======================================
     *  AGREGAR AL CARRITO
     *  Acepta GET y POST
     *  ====================================== */
    public function agregar() {

        // GET o POST (acepta ambos)
        $productoId = $_POST['producto_id'] ?? $_GET['id'] ?? null;
        $cantidad   = $_POST['cantidad'] ?? $_GET['cantidad'] ?? 1;

        if (!$productoId) {
            header("Location: index.php?page=catalogo");
            exit;
        }

        // obtener producto
        $producto = $this->productoModel->obtenerPorId($productoId);
        if (!$producto) {
            header("Location: index.php?page=catalogo");
            exit;
        }

        // si ya existe, sumar
        if (isset($_SESSION['carrito'][$productoId])) {
            $_SESSION['carrito'][$productoId]['cantidad'] += $cantidad;
        } else {
            $_SESSION['carrito'][$productoId] = [
                'producto' => $producto,
                'cantidad' => $cantidad
            ];
        }

        header("Location: index.php?page=carrito");
        exit;
    }

    /** ======================================
     *  ELIMINAR
     *  ====================================== */
    public function eliminar() {
        $productoId = $_GET['id'] ?? null;

        if ($productoId && isset($_SESSION['carrito'][$productoId])) {
            unset($_SESSION['carrito'][$productoId]);
        }

        header("Location: index.php?page=carrito");
        exit;
    }

    /** ======================================
     *  VACIAR CARRITO
     *  ====================================== */
    public function vaciar() {
        $_SESSION['carrito'] = [];
        header("Location: index.php?page=carrito");
        exit;
    }
}
