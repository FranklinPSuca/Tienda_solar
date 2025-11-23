<?php
$title = 'Checkout';
ob_start();
?>

<h2>Checkout</h2>
<form method="post">
  <div class="mb-2">
    <label>Nombre</label>
    <input name="nombre" class="form-control" required>
  </div>
  <div class="mb-2">
    <label>Dirección</label>
    <input name="direccion" class="form-control" required>
  </div>
  <button class="btn btn-success">Pagar</button>
</form>

<?php
$content = ob_get_clean();
include __DIR__ . '/layout.php';
