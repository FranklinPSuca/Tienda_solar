<?php
require_once __DIR__ . '/../config/db.php';

class Producto {
    private $conn;
    private $table = 'productos';

    public function __construct() {
        global $conn;
        $this->conn = $conn;
    }

    public function obtenerTodos() {
        $query = "SELECT p.*, c.nombre as categoria_nombre 
                 FROM " . $this->table . " p 
                 LEFT JOIN categorias c ON p.categoria_id = c.id";
        $result = $this->conn->query($query);
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function obtenerPorCategoria($categoria_id) {
        $query = "SELECT p.*, c.nombre as categoria_nombre 
                 FROM " . $this->table . " p 
                 LEFT JOIN categorias c ON p.categoria_id = c.id 
                 WHERE p.categoria_id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("i", $categoria_id);
        $stmt->execute();
        return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    }
}
?>