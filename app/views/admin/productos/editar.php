<?php
$title = 'Editar Producto';
ob_start();
?>
<h2>Editar Producto</h2>
<form method="post" enctype="multipart/form-data">
  <input name="nombre" class="form-control mb-2" value="<?= htmlspecialchars($prod['nombre']) ?>" required>
  <textarea name="descripcion" class="form-control mb-2"><?= htmlspecialchars($prod['descripcion']) ?></textarea>
  <input name="precio" class="form-control mb-2" value="<?= $prod['precio'] ?>" required>
  <input name="stock" class="form-control mb-2" value="<?= $prod['stock'] ?>">
  <p>Imagen actual: <?= $prod['imagen'] ?></p>
  <input type="file" name="imagen" class="form-control mb-2">
  <button class="btn btn-primary">Actualizar</button>
</form>
<?php
$content = ob_get_clean();
include __DIR__ . '/../../layout.php';
