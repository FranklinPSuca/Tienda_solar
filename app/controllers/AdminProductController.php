<?php
require_once __DIR__ . '/../models/Producto.php';
require_once __DIR__ . '/../helpers/upload.php';

class AdminProductController {

    private $producto;

    public function __construct(PDO $pdo) {
        $this->producto = new Producto($pdo);
    }

    /** ------------------------
     *  LISTAR PRODUCTOS
     * ------------------------ */
    public function listar() {

        $filtros = [];

        if (!empty($_GET['q'])) {
            $filtros['q'] = trim($_GET['q']);
        }

        if (!empty($_GET['categoria']) && ctype_digit($_GET['categoria'])) {
            $filtros['categoria_id'] = (int) $_GET['categoria'];
        }

        $productos  = $this->producto->listar($filtros);
        $categorias = $this->producto->listarCategorias();

        include __DIR__ . '/../views/admin/productos/listar.php';
    }

    /** ------------------------
     *  CREAR PRODUCTO
     * ------------------------ */
    public function crear() {

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            // Procesar imagen
            $imagen = uploadImage(
                $_FILES['imagen'] ?? [],
                __DIR__ . '/../../public/img/productos'
            );

            // Datos limpios
            $data = [
                'nombre'       => trim($_POST['nombre']),
                'descripcion'  => trim($_POST['descripcion']),
                'precio'       => floatval($_POST['precio']),
                'stock'        => intval($_POST['stock']),
                'imagen'       => $imagen ?: null,
                'categoria_id' => !empty($_POST['categoria_id']) ? intval($_POST['categoria_id']) : null
            ];

            $this->producto->crear($data);
            header('Location: admin.php?action=productos');
            exit;
        }

        include __DIR__ . '/../views/admin/productos/crear.php';
    }

    /** ------------------------
     *  EDITAR PRODUCTO
     * ------------------------ */
    public function editar($id) {

        if (!ctype_digit($id)) {
            header('Location: admin.php?action=productos');
            exit;
        }

        $prod = $this->producto->obtener($id);

        if (!$prod) {
            header('Location: admin.php?action=productos');
            exit;
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            // Mantener imagen previa
            $imagen = $prod['imagen'];

            // ¿Se subió nueva imagen?
            $newImage = uploadImage(
                $_FILES['imagen'] ?? [],
                __DIR__ . '/../../public/img/productos'
            );

            if ($newImage) {
                $imagen = $newImage;
            }

            $data = [
                'nombre'       => trim($_POST['nombre']),
                'descripcion'  => trim($_POST['descripcion']),
                'precio'       => floatval($_POST['precio']),
                'stock'        => intval($_POST['stock']),
                'imagen'       => $imagen,
                'categoria_id' => !empty($_POST['categoria_id']) ? intval($_POST['categoria_id']) : null
            ];

            $this->producto->actualizar($id, $data);

            header('Location: admin.php?action=productos');
            exit;
        }

        include __DIR__ . '/../views/admin/productos/editar.php';
    }

    /** ------------------------
     *  ELIMINAR PRODUCTO
     * ------------------------ */
    public function eliminar($id) {

        if (ctype_digit($id)) {
            $this->producto->eliminar($id);
        }

        header('Location: admin.php?action=productos');
        exit;
    }
}