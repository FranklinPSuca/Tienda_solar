<div class="container mt-5">
    <h1>Iniciar sesión</h1>

    <?php if(!empty($error)): ?>
        <div class="alert alert-danger"><?= $error ?></div>
    <?php endif; ?>

    <form method="POST" action="index.php?page=login">
        <input type="hidden" name="return" value="home">

        <div class="mb-3">
            <label>Email</label>
            <input type="email" name="email" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Contraseña</label>
            <input type="password" name="password" class="form-control" required>
        </div>

        <button class="btn btn-primary w-100">Ingresar</button>
    </form>

    <hr>

    <div class="mt-3">
    <a href="index.php?page=registro">¿No tienes cuenta? Crear una</a>
</div>

</div>
