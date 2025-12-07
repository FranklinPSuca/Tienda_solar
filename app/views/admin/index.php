<h1>Productos</h1>

<a href="/tienda_solar/public/admin/create" class="btn btn-primary mb-3">Nuevo producto</a>

<form method="GET" action="/tienda_solar/public/admin" class="mb-3">
  <div class="row">
    <div class="col-md-4">
      <label for="categoria">Categoría</label>
        <select id="categoria" name="categoria" class="form-control">
            <option value="">-- Todas --</option>
            <?php foreach ($categorias as $cat): ?>
                <option value="<?= $cat['id'] ?>"
                <?= ($categoria == $cat['id']) ? 'selected' : '' ?>>
                <?= htmlspecialchars($cat['nombre']) ?>
                </option>
            <?php endforeach; ?>
        </select>
    </div>

    <div class="col-md-4">
      <label for="codigo">Código</label>
      <input type="text" id="codigo" name="codigo" class="form-control"
             value="<?= htmlspecialchars($codigo ?? '') ?>">
    </div>

    <div class="col-md-4 d-flex align-items-end">
      <button type="submit" class="btn btn-primary">Filtrar</button>
      <a href="/tienda_solar/public/admin" class="btn btn-secondary ms-2">Limpiar</a>
    </div>
  </div>
</form>
<table class="table">
    <tr><th>ID</th><th>codigo</th><th>Nombre</th><th>Precio</th><th>Stock</th><th>Acciones</th></tr>
    <?php foreach($items as $p): ?>
        <tr>
            <td><?= $p['id'] ?></td>
            <td><?= $p['codigo'] ?></td>
            <td><?= $p['nombre'] ?></td>
            <td><?= $p['precio'] ?></td>
            <td><?= $p['stock'] ?></td>
            <td>
            <a href="/tienda_solar/public/admin/show/<?= $p['id'] ?>" class="btn btn-info">Ver</a>
            <a href="/tienda_solar/public/admin/edit/<?= $p['id'] ?>" class="btn btn-warning">Editar</a>
            <a href="/tienda_solar/public/index.php?page=admin&action=delete&id=<?= $p['id'] ?>" class="btn btn-danger">Eliminar</a>

            </td>
        </tr>
    <?php endforeach; ?>
</table>