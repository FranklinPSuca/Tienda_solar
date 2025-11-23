<?php
require_once __DIR__ . '/../models/Carrito.php';
require_once __DIR__ . '/../models/Producto.php';

class CheckoutController {

    private $carrito;
    private $pdo;

    public function __construct(PDO $pdo) {
        $this->pdo = $pdo;
        $this->carrito = new Carrito($pdo);
    }

    public function procesar() {

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $items = $this->carrito->listar();

            if (empty($items)) {
                die("El carrito está vacío.");
            }

            try {

                $this->pdo->beginTransaction();

                $productoModel = new Producto($this->pdo);

                foreach ($items as $item) {

                    // Carrito devuelve el ID así:
                    $productoId = $item['id'];
                    $cantidad   = $item['cantidad'];

                    // Ejecutar descuento
                    $ok = $productoModel->descontarStock($productoId, $cantidad);

                    if (!$ok) {
                        $this->pdo->rollBack();
                        die("Error: No hay stock suficiente para el producto ID $productoId");
                    }
                }
                // Calcular total
                $total = 0;
                foreach ($items as $item) {
                    $total += $item['precio'] * $item['cantidad'];
                }

                // Insertar orden
                $stmt = $this->pdo->prepare("INSERT INTO ordenes (fecha, total) VALUES (NOW(), ?)");
                $stmt->execute([$total]);
                $ordenId = $this->pdo->lastInsertId();

                // Insertar detalle de cada producto
                $stmtDetalle = $this->pdo->prepare("
                    INSERT INTO detalle_orden (orden_id, producto_id, cantidad, precio_unitario)
                    VALUES (?, ?, ?, ?)
                ");

                foreach ($items as $item) {
                    $stmtDetalle->execute([
                        $ordenId,
                        $item['id'],
                        $item['cantidad'],
                        $item['precio']
                    ]);
                }

                // Confirmar todo
                $this->pdo->commit();

                // Vaciar carrito
                $this->carrito->vaciar();

                include __DIR__ . '/../views/checkout.php';
                return;

            } catch (Exception $e) {

                $this->pdo->rollBack();
                die("Error procesando el checkout: " . $e->getMessage());
            }
        }

        // GET → Mostrar la vista
        $items = $this->carrito->listar();
        include __DIR__ . '/../views/checkout.php';
    }
}