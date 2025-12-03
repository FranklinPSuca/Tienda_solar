<?php
// app/models/Producto.php
class Producto {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    /**
     * Obtener todas las categorías disponibles
     */
    public function obtenerCategorias() 
    {
        try {
            $sql = "SELECT id, nombre FROM categorias ORDER BY nombre ASC";
            $stmt = $this->pdo->query($sql);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (Throwable $e) {
            die("ERROR SQL obtenerCategorias(): " . $e->getMessage());
        }
    }


    /**
     * Buscar productos con filtros dinámicos
     * @param string $buscar Texto de búsqueda
     * @param string $categoria ID de categoría
     * @param string $orden Orden de resultados (precio_asc, precio_desc)
     */
    public function buscarProductos($buscar = '', $categoria = '', $orden = '') {
        $sql = "SELECT * FROM productos WHERE 1=1";
        $params = [];

        // Filtro por nombre
        if ($buscar !== '') {
            $sql .= " AND nombre LIKE :buscar";
            $params[':buscar'] = "%$buscar%";
        }

        // Filtro por categoría
        if ($categoria !== '') {
            $sql .= " AND categoria_id = :categoria";
            $params[':categoria'] = $categoria;
        }

        // Ordenamiento
        if ($orden === 'precio_asc') {
            $sql .= " ORDER BY precio ASC";
        } elseif ($orden === 'precio_desc') {
            $sql .= " ORDER BY precio DESC";
        } else {
            $sql .= " ORDER BY nombre ASC"; // orden por defecto
        }

        $stmt = $this->pdo->prepare($sql);
        $stmt->execute($params);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Obtener un producto por ID
     */
    public function obtenerPorId($id) {
    $stmt = $this->pdo->prepare("SELECT * FROM productos WHERE id = ?");
    $stmt->execute([$id]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    public function obtenerTodos() {
    $stmt = $this->pdo->query("SELECT * FROM productos");
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function actualizarStock($id, $cantidadVendida) {
    $sql = "UPDATE productos 
            SET stock = stock - :cantidad 
            WHERE id = :id AND stock >= :cantidad";

    $stmt = $this->pdo->prepare($sql);
    $stmt->bindValue(':cantidad', $cantidadVendida, PDO::PARAM_INT);
    $stmt->bindValue(':id', $id, PDO::PARAM_INT);
    $stmt->execute();

    return $stmt->rowCount() > 0; // True si actualizó stock
    }

    public function tieneStock($id, $cantidad) {
    $sql = "SELECT stock FROM productos WHERE id = :id";
    $stmt = $this->pdo->prepare($sql);
    $stmt->execute([':id' => $id]);
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    return ($row && $row['stock'] >= $cantidad);
    }
    
    public function descontarStock($id, $cantidad){
        $sql = "UPDATE productos 
                SET stock = stock - :cantidad 
                WHERE id = :id AND stock >= :cantidadMin";

        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':cantidad', $cantidad, PDO::PARAM_INT);
        $stmt->bindValue(':cantidadMin', $cantidad, PDO::PARAM_INT);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);

        return $stmt->execute();
    }
}