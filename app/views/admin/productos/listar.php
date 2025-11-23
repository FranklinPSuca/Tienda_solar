<?php
$title = 'Admin - Productos';
ob_start();
?>
<h2>Productos</h2>
<a href="admin.php?action=crear" class="btn btn-success mb-2">Crear producto</a>
<table class="table">
  <thead><tr><th>ID</th><th>Nombre</th><th>Precio</th><th>Stock</th><th>Acciones</th></tr></thead>
  <tbody>
    <?php foreach($productos as $p): ?>
      <tr>
        <td><?= $p['id'] ?></td>
        <td><?= htmlspecialchars($p['nombre']) ?></td>
        <td>S/ <?= number_format($p['precio'],2) ?></td>
        <td><?= $p['stock'] ?></td>

        <td>
          <a href="admin.php?action=editar&id=<?= $p['id'] ?>" class="btn btn-sm btn-primary">Editar</a>
          <a href="admin.php?action=eliminar&id=<?= $p['id'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('Eliminar?')">Eliminar</a>
        </td>
      </tr>
    <?php endforeach; ?>
  </tbody>
</table>
<?php
$content = ob_get_clean();
include __DIR__ . '/../../layout.php';
