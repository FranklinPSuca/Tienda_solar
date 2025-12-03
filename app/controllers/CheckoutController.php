<?php
require_once __DIR__ . '/../helpers/auth.php';
require_once __DIR__ . '/../models/Carrito.php';

class CheckoutController {

    private $carrito;
    private $pdo;

    public function __construct($pdo){
        $this->carrito = new Carrito($pdo);
        $this->pdo     = $pdo;
    }

    public function index(){
        requireLogin('checkout');

        $items = $_SESSION['carrito'] ?? [];

        // Render vista dentro del layout
        ob_start(); 
        require VIEW_PATH . 'checkout.php'; 
        $content = ob_get_clean();

        require VIEW_PATH . 'layout.php';
    }

    public function procesar(){
        requireLogin('checkout');

        $items = $_SESSION['carrito'] ?? [];

        if(empty($items)){
            header("Location: index.php?page=carrito");
            exit;
        }

        // 1️⃣ Cargar modelo
        require_once __DIR__ . '/../models/Producto.php';
        $productoModel = new Producto($this->pdo);

        // 2️⃣ VALIDAR STOCK ANTES DE DESCONTAR
        foreach($items as $item){
            $producto  = $item['producto'];
            $cantidad  = $item['cantidad'];

            if ($producto['stock'] < $cantidad) {
                $_SESSION['error'] = "⚠️ No hay suficiente stock para {$producto['nombre']}";
                header("Location: index.php?page=carrito");
                exit;
            }
        }

        // 3️⃣ Calcular total
        $total = 0;
        foreach($items as $item){
            $total += $item['producto']['precio'] * $item['cantidad'];
        }

        // Crear orden en la tabla "ordenes"
        $stmt = $this->pdo->prepare("INSERT INTO ordenes (fecha, total) VALUES (NOW(), :total)");
        $stmt->bindValue(':total', $total);
        $stmt->execute();
        $ordenId = $this->pdo->lastInsertId();

        // Insertar detalle en la tabla "detalle_orden"
        $stmtDetalle = $this->pdo->prepare("
            INSERT INTO detalle_orden (orden_id, producto_id, cantidad, precio_unitario)
            VALUES (:orden_id, :producto_id, :cantidad, :precio_unitario)
        ");

        foreach($items as $item){
            $producto  = $item['producto'];
            $cantidad  = $item['cantidad'];

            // Insertar detalle
            $stmtDetalle->execute([
                ':orden_id'        => $ordenId,
                ':producto_id'     => $producto['id'],
                ':cantidad'        => $cantidad,
                ':precio_unitario' => $producto['precio']
            ]);

            // Descontar stock
            $productoModel->descontarStock($producto['id'], $cantidad);
        }

        // 6️⃣ Vaciar carrito
        $_SESSION['carrito'] = [];

        // 7️⃣ Mostrar vista de éxito con datos de la orden
        renderView('checkout_success', [
            'title'   => 'Compra realizada',
            'ordenId' => $ordenId,
            'total'   => $total
        ]);
    }
}