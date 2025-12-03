<h2>Resumen de compra</h2>

<?php if(empty($items)): ?>
    <div class="alert alert-warning">
        Tu carrito está vacío.
    </div>
    <a class="btn btn-primary" href="index.php?page=catalogo">Volver al catálogo</a>
<?php else: ?>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Producto</th>
                <th>Cantidad</th>
                <th>Precio</th>
                <th>Total</th>
            </tr>
        </thead>

        <tbody>
            <?php $total = 0; ?>
            <?php foreach($items as $item): ?>
                <?php $subtotal = $item['producto']['precio'] * $item['cantidad'];?>
                <?php $total += $subtotal; ?>
                <tr>
                    <td><?= $item['producto']['nombre']; ?></td>
                    <td><?= $item['cantidad']; ?></td>
                    <td>S/ <?= number_format($item['producto']['precio'], 2); ?></td>
                    <td>S/ <?= number_format($subtotal, 2); ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <h3>Total: <strong>S/ <?= number_format($total, 2); ?></strong></h3>

    <form method="POST" action="index.php?page=checkout">
        <button class="btn btn-success">Confirmar compra</button>
    </form>

<?php endif; ?>

