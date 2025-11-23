<?php
$title = 'Carrito';
ob_start();
?>

<h2>Carrito</h2>

<?php if (empty($items)): ?>
  <div class="alert alert-info">Tu carrito está vacío.</div>
  <a href="/tienda-solar/public/catalogo.php" class="btn btn-secondary">Volver al catálogo</a>
<?php else: ?>
  <table class="table table-bordered">
    <thead>
      <tr>
        <th>Producto</th>
        <th>Cantidad</th>
        <th>Precio</th>
        <th>Subtotal</th>
      </tr>
    </thead>
    <tbody>
      <?php $total = 0; ?>
      <?php foreach ($items as $it): ?>
        <?php $subtotal = $it['cantidad'] * $it['precio']; $total += $subtotal; ?>
        <tr>
          <td><?= htmlspecialchars($it['nombre']) ?></td>
          <td><?= $it['cantidad'] ?></td>
          <td>S/ <?= number_format($it['precio'], 2) ?></td>
          <td>S/ <?= number_format($subtotal, 2) ?></td>
        </tr>
      <?php endforeach; ?>
    </tbody>
    <tfoot>
      <tr>
        <th colspan="3" class="text-end">Total</th>
        <th>S/ <?= number_format($total, 2) ?></th>
      </tr>
    </tfoot>
  </table>

  <div class="d-flex gap-2">
    <form method="post" action="carrito.php?action=vaciar">
      <button type="submit" class="btn btn-danger">Vaciar carrito</button>
    </form>
    <a href="/tienda-solar/public/catalogo.php" class="btn btn-secondary">Seguir comprando</a>
    <a href="/tienda-solar/public/checkout.php" class="btn btn-success">Ir a pagar</a>
  </div>
<?php endif; ?>

<?php
$content = ob_get_clean();
include __DIR__ . '/layout.php';