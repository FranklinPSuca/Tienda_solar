<?php
class AdminController {
    private $model;

    public function __construct($pdo) {
        require_once APP_PATH . '/models/Admin.php';
        $this->model = new AdminModel($pdo);
    }

    // Listar todos los registros
    public function index() {
    $categoria = ($_GET['categoria'] ?? '') !== '' ? (int)$_GET['categoria'] : null;
    $codigo    = ($_GET['codigo'] ?? '') !== '' ? (int)$_GET['codigo'] : null;

    $items      = $this->model->filter($categoria, $codigo);
    $categorias = $this->model->categorias();

    renderView('admin/index', [
        'items'      => $items,
        'categorias' => $categorias,
        'categoria'  => $categoria,
        'codigo'     => $codigo
    ]);


    }

    // Mostrar formulario de creación
    public function create() {
        renderView('admin/create');
    }

    // Guardar nuevo registro
    public function store($data) {
        $this->model->insert($data);
        header("Location: index.php?page=admin");
        exit;
    }

    // Mostrar formulario de edición
    public function edit($id) {
        $item = $this->model->find($id);
        renderView('admin/edit', ['item' => $item]);
    }

    // Actualizar registro
    public function update($id, $data) {
        $this->model->update($id, $data);
        header("Location: /tienda_solar/public/admin");
        exit;
    }

    // Mostrar detalle de un registro
    public function show($id) {
        $item = $this->model->find($id);
        renderView('admin/show', ['item' => $item]);
    }

    // Eliminar registro
    public function delete($id) {
        $this->model->delete($id);
        header("Location: index.php?page=admin");
        exit;
    }
}