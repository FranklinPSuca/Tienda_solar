<?php
$title = $p['nombre'] ?? 'Producto';
ob_start();
?>

<div class="row">
  <div class="col-md-6">
    <img src="<?= htmlspecialchars($p['imagen']) ?>" class="img-fluid">
  </div>
  <div class="col-md-6">
    <h2><?= htmlspecialchars($p['nombre']) ?></h2>
    <p><?= nl2br(htmlspecialchars($p['descripcion'])) ?></p>
    <p><strong>S/ <?= number_format($p['precio'],2) ?></strong></p>
    <form action="/tienda-solar/public/carrito.php?action=agregar" method="post">
      <input type="hidden" name="producto_id" value="<?= $p['id'] ?>">
      <input type="number" name="cantidad" value="1" min="1" class="form-control mb-2" style="width:120px;">
      <button class="btn btn-success">Añadir al carrito</button>
    </form>
  </div>
</div>

<?php
$content = ob_get_clean();
include __DIR__ . '/layout.php';
