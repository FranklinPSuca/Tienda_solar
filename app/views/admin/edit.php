<h1>Editar producto</h1>
<form method="POST" action="/tienda_solar/public/admin/update">
    <input type="hidden" name="id" value="<?= $item['id'] ?>">
  <div class="mb-3">
    <label for="nombre">Nombre</label>
    <input type="text" id="nombre" name="nombre" class="form-control" 
           value="<?= htmlspecialchars($item['nombre']) ?>" required>
  </div>

  <div class="mb-3">
    <label for="precio">Precio</label>
    <input type="number" id="precio" name="precio" class="form-control" step="0.01"
           value="<?= htmlspecialchars($item['precio']) ?>" required>
  </div>

  <div class="mb-3">
    <label for="stock">Stock</label>
    <input type="number" id="stock" name="stock" class="form-control"
           value="<?= htmlspecialchars($item['stock']) ?>" required>
  </div>

  <button type="submit" class="btn btn-primary">Actualizar</button>
</form>