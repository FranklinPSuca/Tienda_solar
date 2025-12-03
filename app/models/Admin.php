<?php
class AdminModel {
    private $db;

    public function __construct($pdo) {
        $this->db = $pdo;
    }

    // Listar todos los productos
    public function all() {
        $stmt = $this->db->query("SELECT id, nombre, precio, stock FROM productos ORDER BY id DESC");
        return $stmt->fetchAll();
    }

    // Buscar producto por ID
    public function find($id) {
        $stmt = $this->db->prepare("SELECT id, nombre, precio, stock FROM productos WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch();
    }

    // Insertar nuevo producto
    public function insert($data) {
        $stmt = $this->db->prepare(
            "INSERT INTO productos (nombre, precio, stock) VALUES (:nombre, :precio, :stock)"
        );
        return $stmt->execute([
            ':nombre' => $data['nombre'],
            ':precio' => $data['precio'],
            ':stock'  => $data['stock']
        ]);
    }

    // Actualizar producto existente
    public function update($id, $data) {
        $stmt = $this->db->prepare(
            "UPDATE productos SET nombre = :nombre, precio = :precio, stock = :stock WHERE id = :id"
        );
        return $stmt->execute([
            ':nombre' => $data['nombre'],
            ':precio' => $data['precio'],
            ':stock'  => $data['stock'],
            ':id'     => $id
        ]);
    }

    // Eliminar producto
    public function delete($id) {
        $stmt = $this->db->prepare("DELETE FROM productos WHERE id = ?");
        return $stmt->execute([$id]);
    }

    public function filter($categoria = null, $codigo = null) {
        $sql = "SELECT p.*, c.nombre AS categoria_nombre
                FROM productos p
                LEFT JOIN categorias c ON p.categoria_id = c.id
                WHERE 1=1";
        $params = [];

        if ($categoria !== null) {
            $sql .= " AND p.categoria_id = :categoria";
            $params[':categoria'] = $categoria;
        }

        if ($codigo !== null) {
            $sql .= " AND p.codigo = :codigo"; // campo INT → igualdad
            $params[':codigo'] = $codigo;
        }

        $stmt = $this->db->prepare($sql);
        $stmt->execute($params);
        return $stmt->fetchAll();
    }
    public function categorias() {
        $stmt = $this->db->query("SELECT id, nombre FROM categorias ORDER BY nombre ASC");
        return $stmt->fetchAll();
    }

}