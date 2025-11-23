<?php
require_once __DIR__ . '/../models/Producto.php';
require_once __DIR__ . '/../helpers/upload.php';

class AdminProductController {
    private $producto;
    public function __construct(PDO $pdo) { $this->producto = new Producto($pdo); }

    public function listar() {
        $productos = $this->producto->listar();
        include __DIR__ . '/../views/admin/productos/listar.php';
    }

    public function crear() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $imagen = uploadImage($_FILES['imagen'] ?? [], __DIR__ . '/../../public/img/productos');
            $data = [
                'nombre'=>$_POST['nombre'],'descripcion'=>$_POST['descripcion'],'precio'=>$_POST['precio'],
                'stock'=>$_POST['stock'],'imagen'=>$imagen,'categoria_id'=>$_POST['categoria_id'] ?? null
            ];
            $this->producto->crear($data);
            header('Location: admin.php?action=productos');
            exit;
        }
        include __DIR__ . '/../views/admin/productos/crear.php';
    }

    public function editar($id) {
        $prod = $this->producto->obtener($id);
        if (!$prod) { header('Location: admin.php?action=productos'); exit; }
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $imagen = $prod['imagen'];
            $new = uploadImage($_FILES['imagen'] ?? [], __DIR__ . '/../../public/img/productos');
            if ($new) $imagen = $new;
            $data = ['nombre'=>$_POST['nombre'],'descripcion'=>$_POST['descripcion'],'precio'=>$_POST['precio'],'stock'=>$_POST['stock'],'imagen'=>$imagen,'categoria_id'=>$_POST['categoria_id'] ?? null];
            $this->producto->actualizar($id, $data);
            header('Location: admin.php?action=productos');
            exit;
        }
        include __DIR__ . '/../views/admin/productos/editar.php';
    }

    public function eliminar($id) {
        $this->producto->eliminar($id);
        header('Location: admin.php?action=productos');
        exit;
    }
}
