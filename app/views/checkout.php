<?php
$title = 'Checkout';

$mensaje = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $mensaje = "Compra realizada";
}

ob_start();
?>

<h2>Checkout</h2>

<?php if (!empty($mensaje)): ?>
    <div class="alert alert-success">
        <?= $mensaje ?>
    </div>
<?php endif; ?>

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
?>
