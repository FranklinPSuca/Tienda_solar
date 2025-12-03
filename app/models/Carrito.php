<?php
class Carrito {
    private $pdo;
    public function __construct(PDO $pdo) { $this->pdo = $pdo; }

    public function agregar($producto_id, $cantidad=1) {
        if (!isset($_SESSION['cart'])) $_SESSION['cart'] = [];
        if (!isset($_SESSION['cart'][$producto_id])) $_SESSION['cart'][$producto_id] = 0;
        $_SESSION['cart'][$producto_id] += $cantidad;
    }

    public function listar() {
        if (empty($_SESSION['cart'])) return [];
        $ids = array_keys($_SESSION['cart']);
        $in = str_repeat('?,', count($ids)-1) . '?';
        $stmt = $this->pdo->prepare("SELECT * FROM productos WHERE id IN ($in)");
        $stmt->execute($ids);
        $items = $stmt->fetchAll();
        foreach ($items as &$it) $it['cantidad'] = $_SESSION['cart'][$it['id']];
        return $items;
    }

    public function vaciar() {
    unset($_SESSION['cart']);
    }   
}
