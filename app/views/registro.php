
<div class="container mt-5">
    <h2>Crear cuenta</h2>

    <?php if(isset($error)): ?>
        <div class="alert alert-danger"><?= $error ?></div>
    <?php endif; ?>

    <form method="POST" action="index.php?page=registro_crear">
        <div class="mb-3">
            <label>Nombre completo</label>
            <input type="text" name="nombre" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Correo electrónico</label>
            <input type="email" name="email" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Contraseña</label>
            <input type="password" name="password" minlength="6" class="form-control" required>
        </div>

        <button class="btn btn-primary">Registrar</button>
        <a href="index.php?page=login" class="btn btn-secondary">Ya tengo cuenta</a>
    </form>
</div>

