<?php
$title = 'Admin - Productos';
ob_start();
?>
<h2>Productos</h2>
  <div class="col-md-3">
    <form method="get" action="admin.php" class="mb-2">
  <input type="hidden" name="action" value="productos">
  
  <input name="q" class="form-control" placeholder="Buscar..." 
         value="<?= htmlspecialchars($_GET['q'] ?? '') ?>">
  
  <div class="mb-2">
    <select name="categoria" class="form-select">
      <option value="">Todas las categorías</option>
      <?php foreach ($categorias as $c): ?>
        <option value="<?= $c['id'] ?>" 
          <?= (isset($_GET['categoria']) && $_GET['categoria'] == $c['id']) ? 'selected' : '' ?>>
          <?= htmlspecialchars($c['nombre']) ?>
        </option>
      <?php endforeach; ?>
    </select>
  </div>
  
  <button class="btn btn-sm btn-outline-primary">Filtrar</button>
  </form>
  </div>
<a href="admin.php?action=crear" class="btn btn-success mb-2">Crear producto</a>
<table class="table">
  <thead><tr><th>ID</th><th>codigo</th><th>Nombre</th><th>Precio</th><th>Stock</th><th>Acciones</th></tr></thead>
  <tbody>
    <?php foreach($productos as $p): ?>
      <tr>
        <td><?= $p['id'] ?></td>
        <td><?= htmlspecialchars($p['codigo']) ?></td>
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
