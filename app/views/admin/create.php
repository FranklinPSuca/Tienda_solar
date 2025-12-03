<h1>Nuevo producto</h1>
<form method="POST" action="index.php?page=admin&action=store">
  <div class="mb-3">
    <label>Nombre</label>
    <input type="text" name="nombre" class="form-control" required>
  </div>
  <div class="mb-3">
    <label>Precio</label>
    <input type="number" name="precio" class="form-control" required>
  </div>
  <div class="mb-3">
    <label>Stock</label>
    <input type="number" name="stock" class="form-control" required>
  </div>
  <button type="submit" class="btn btn-success">Guardar</button>
<button type="button" class="btn btn-secondary" 
        onclick="window.location.href='/tienda_solar/public/admin'">
    Cancelar
</button>
</form>