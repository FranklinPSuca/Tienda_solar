<?php
require_once __DIR__ . '/../config/db.php';

class Categoria {
    private $conn;
    private $table = 'categorias';

    public function __construct() {
        global $conn;
        $this->conn = $conn;
    }

    public function obtenerTodas() {
        $query = "SELECT * FROM " . $this->table . " ORDER BY nombre ASC";
        $result = $this->conn->query($query);
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function obtenerPorId($id) {
        $query = "SELECT * FROM " . $this->table . " WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }
}
?>