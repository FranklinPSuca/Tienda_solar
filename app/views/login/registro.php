<div class="container mt-5">
    <h1>Crear cuenta</h1>

    <?php if(!empty($error)): ?>
        <div class="alert alert-danger"><?= $error ?></div>
    <?php endif; ?>

    <form method="POST" action="index.php?page=registro">
        <input type="hidden" name="return" value="<?= htmlspecialchars($return ?? '') ?>">

        <div class="mb-3">
            <label>Nombres</label>
            <input type="text" name="nombre" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Email</label>
            <input type="email" name="email" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Contraseña</label>
            <input type="password" name="password" class="form-control" required>
        </div>

        <button class="btn btn-success w-100">Registrarse</button>
    </form>
</div>
