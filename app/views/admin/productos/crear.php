<?php
$title = 'Crear Producto';
ob_start();
?>
<h2>Crear Producto</h2>
<form method="post" enctype="multipart/form-data">
  <input name="nombre" class="form-control mb-2" placeholder="Nombre" required>
  <textarea name="descripcion" class="form-control mb-2" placeholder="Descripción"></textarea>
  <input name="precio" class="form-control mb-2" placeholder="Precio" required>
  <input name="stock" class="form-control mb-2" placeholder="Stock">
  <input type="file" name="imagen" class="form-control mb-2">
  <button class="btn btn-success">Guardar</button>
</form>
<?php
$content = ob_get_clean();
include __DIR__ . '/../../layout.php';
