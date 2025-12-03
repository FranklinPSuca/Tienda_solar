<div class="container mt-5 pt-4">
  <h1 class="mb-4 text-center">
    <i class="bi bi-cart"></i> Carrito de Compras
  </h1>

  <?php if (!empty($items)): ?>
    <table class="table table-striped">
      <thead>
        <tr>
          <th>Producto</th>
          <th>Precio</th>
          <th>Cantidad</th>
          <th>Total</th>
          <th></th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($items as $id => $item): ?>
          <tr>
            <td><?= htmlspecialchars($item['producto']['nombre']) ?></td>
            <td>S/ <?= number_format($item['producto']['precio'], 2) ?></td>
            <td><?= $item['cantidad'] ?></td>
            <td>S/ <?= number_format($item['producto']['precio'] * $item['cantidad'], 2) ?></td>
            <td>
              <a href="index.php?page=carrito&action=eliminar&id=<?= $id ?>" 
                 class="btn btn-sm btn-danger">
                 <i class="bi bi-trash"></i> Quitar
              </a>
            </td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>

    <a href="index.php?page=catalogo" class="btn btn-outline-secondary" role="button">
      <i class="bi bi-arrow-left"></i> Seguir comprando
    </a>
    <a href="index.php?page=carrito&action=vaciar" class="btn btn-outline-danger">
      <i class="bi bi-x-circle"></i> Vaciar carrito
    </a>
    <?php if (isset($_SESSION['usuario_id'])): ?>
      <a href="index.php?page=checkout" class="btn btn-success">
        <i class="bi bi-credit-card"></i> Proceder al pago
      </a>
    <?php else: ?>
      <a href="index.php?page=login&return=checkout" class="btn btn-success">
        <i class="bi bi-credit-card"></i> Proceder al pago
      </a>
    <?php endif; ?>
  <?php else: ?>
    <div class="alert alert-warning text-center">
      <i class="bi bi-exclamation-triangle"></i> Tu carrito está vacío.
    </div>
    <div class="text-center mt-3">
      <a href="index.php?page=catalogo" class="btn btn-outline-primary">
        Volver al catálogo
      </a>
    </div>
  <?php endif; ?>
</div>