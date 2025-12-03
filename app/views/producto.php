
<div class="row">
  <div class="col-md-6">
    <img src="<?= htmlspecialchars($p['imagen']) ?>" class="img-fluid">
  </div>
  <div class="col-md-6">
    <h2><?= htmlspecialchars($p['nombre']) ?></h2>
    <p><?= nl2br(htmlspecialchars($p['descripcion'])) ?></p>
    <p><strong>S/ <?= number_format($p['precio'],2) ?></strong></p>

    <form method="post" action="index.php?page=carrito&action=agregar">
        <input type="hidden" name="producto_id" value="<?= $p['id'] ?>">

        <!-- Campo para cantidad -->
        <div class="mb-3">
          <label for="cantidad" class="form-label">Cantidad</label>
          <input type="number" name="cantidad" id="cantidad" value="1" min="1" class="form-control w-25">
        </div>

        <button type="submit" class="btn btn-success w-50">
            <i class="bi bi-cart-plus"></i> Añadir al carrito
        </button>
    </form>
  </div>
</div>