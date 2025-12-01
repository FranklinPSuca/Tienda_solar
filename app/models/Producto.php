<?php
class Producto {
    private $pdo;
    public function __construct(PDO $pdo) { $this->pdo = $pdo; }

    public function listarCategorias() {
    $stmt = $this->pdo->query("SELECT id, nombre FROM categorias ORDER BY id");
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function listar($filtros = []) {
    $sql = 'SELECT * FROM productos WHERE 1';
    $params = [];

    if (!empty($filtros['categoria_id'])) {
        $sql .= ' AND categoria_id = :cat';
        $params[':cat'] = (int)$filtros['categoria_id'];
    }

    if (!empty($filtros['q'])) {
        $sql .= ' AND (nombre LIKE :q1 OR codigo LIKE :q2)';
        $params[':q1'] = '%'.$filtros['q'].'%';
        $params[':q2'] = '%'.$filtros['q'].'%';
    }

    $sql .= ' ORDER BY id';

    $stmt = $this->pdo->prepare($sql);
    $stmt->execute($params);

    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

    public function obtener($id) {
        $stmt = $this->pdo->prepare('SELECT * FROM productos WHERE id = :id');
        $stmt->execute([':id' => $id]);
        return $stmt->fetch();
    }

    public function crear($data) {
        $stmt = $this->pdo->prepare('INSERT INTO productos (nombre, descripcion, precio, stock, imagen, categoria_id) VALUES (:n,:d,:p,:s,:i,:c)');
        $stmt->execute([
            ':n'=>$data['nombre'],':d'=>$data['descripcion']??'',':p'=>$data['precio'],
            ':s'=>$data['stock']??0,':i'=>$data['imagen']??null,':c'=>$data['categoria_id']??null
        ]);
        return $this->pdo->lastInsertId();
    }

    public function actualizar($id, $data) {
        $stmt = $this->pdo->prepare('UPDATE productos SET nombre=:n, descripcion=:d, precio=:p, stock=:s, imagen=:i, categoria_id=:c WHERE id=:id');
        return $stmt->execute([
            ':n'=>$data['nombre'],':d'=>$data['descripcion']??'',':p'=>$data['precio'],
            ':s'=>$data['stock']??0,':i'=>$data['imagen']??null,':c'=>$data['categoria_id']??null,':id'=>$id
        ]);
    }

    public function eliminar($id) {
        $stmt = $this->pdo->prepare('DELETE FROM productos WHERE id=:id');
        return $stmt->execute([':id'=>$id]);
    }

    public static function obtenerPorId($pdo, $id) {
        $stmt = $pdo->prepare("SELECT * FROM productos WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function descontarStock($idProducto, $cantidad) {
    $sql = "UPDATE productos 
        SET stock = stock - :cantidad 
        WHERE id = :id AND stock >= :stockMinimo";

    $stmt = $this->pdo->prepare($sql);
    $stmt->execute([
        ':cantidad' => $cantidad,
        ':id'       => $idProducto,
        ':stockMinimo' => $cantidad
    ]);

    return $stmt->rowCount() > 0; // devuelve true solo si se actualizó
    }
}
