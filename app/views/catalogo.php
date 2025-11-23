<?php
$title = 'Catálogo';
ob_start();
?>

<h2>Catálogo</h2>
<div class="row mb-3">
  <div class="col-md-3">
    <form method="get">
      <div class="mb-2">
        <input name="q" class="form-control" placeholder="Buscar..." value="<?= htmlspecialchars($_GET['q'] ?? '') ?>">
      </div>
      <div class="mb-2">
        <select name="categoria" class="form-select">
          <option value="">Todas las categorías</option>
          <?php foreach($categorias as $c): ?>
            <option value="<?= $c['id'] ?>" <?= (isset($_GET['categoria']) && $_GET['categoria']==$c['id'])? 'selected':'' ?>><?= htmlspecialchars($c['nombre']) ?></option>
          <?php endforeach; ?>
        </select>
      </div>
      <button class="btn btn-sm btn-outline-primary">Filtrar</button>
    </form>
  </div>
  <div class="col-md-9">
    <div class="row">

      <?php if (empty($productos)): ?>
        <div class="alert alert-warning">No se encontraron productos.</div>
      <?php endif; ?>

      <?php foreach($productos as $p): ?>
        <div class="col-md-4 mb-4">
          <div class="card h-100">
            <img src="<?= htmlspecialchars($p['imagen']) ?>" class="img-fluid">
            <div class="card-body d-flex flex-column">
              <h5 class="card-title"><?= htmlspecialchars($p['nombre']) ?></h5>
              <p class="card-text">S/ <?= number_format($p['precio'],2) ?></p>
              <a href="/tienda-solar/public/producto.php?id=<?= $p['id'] ?>" class="mt-auto btn btn-primary">Ver</a>
            </div>
          </div>
        </div>
      <?php endforeach; ?>

    </div>
  </div>
</div>

<?php
$content = ob_get_clean();
include __DIR__ . '/layout.php';
