<div class="container mt-5 pt-4">
  <h1 class="mb-4 text-center">
    <i class="bi bi-shop text-warning me-2"></i> Catálogo de Productos
  </h1>

  <!-- Filtros -->
<form method="get" action="index.php">
  <input type="hidden" name="page" value="catalogo">

  <input type="text" name="buscar" value="<?= htmlspecialchars($buscar) ?>" placeholder="Buscar...">

  <select name="categoria">
    <option value="">Todas</option>
    <?php foreach ($categorias as $c): ?>
      <option value="<?= $c['id'] ?>" <?= $categoria == $c['id'] ? 'selected' : '' ?>>
        <?= htmlspecialchars($c['nombre']) ?>
      </option>
    <?php endforeach; ?>
  </select>

  <select name="orden">
    <option value="">Por Precio</option>
    <option value="precio_asc" <?= $orden === 'precio_asc' ? 'selected' : '' ?>>Precio ascendente</option>
    <option value="precio_desc" <?= $orden === 'precio_desc' ? 'selected' : '' ?>>Precio descendente</option>
  </select>

  <button type="submit">Filtrar</button>
</form>

  <!-- Productos -->
  <div class="row">
    <?php if (!empty($productos)): ?>
      <?php foreach ($productos as $p): ?>
        <div class="col-md-4 mb-4">
          <div class="card h-100 shadow-sm">
            <img src="<?= htmlspecialchars($p['imagen']) ?>" class="img-fluid">
            <div class="card-body d-flex flex-column">
              <h5 class="card-title"><?= htmlspecialchars($p['nombre']) ?></h5>
              <p class="card-text text-muted"><?= htmlspecialchars($p['descripcion']) ?></p>
              <p class="fw-bold text-success mb-3">S/ <?= number_format($p['precio'], 2) ?></p>

              <div class="mt-auto">
                <a href="index.php?page=producto&id=<?= $p['id'] ?>" 
                  class="btn btn-outline-secondary w-100 mb-2">
                  <i class="bi bi-eye"></i> Ver detalle
                </a>
                <form method="post" action="index.php?page=carrito&action=agregar">
                    <input type="hidden" name="producto_id" value="<?= $p['id'] ?>">
                    <input type="hidden" name="cantidad" value="1">
                    <button type="submit" class="btn btn-success w-100">
                        <i class="bi bi-cart-plus"></i> Añadir al carrito
                    </button>
                </form>
              </div>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
    <?php else: ?>
      <div class="col-12">
        <div class="alert alert-warning text-center">
          <i class="bi bi-exclamation-triangle"></i> No se encontraron productos.
        </div>
      </div>
    <?php endif; ?>
  </div>
</div>
