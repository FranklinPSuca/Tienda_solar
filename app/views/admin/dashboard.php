<?php include_once __DIR__ . '/../partials/header.php'; ?>

        <div class="container mt-4">
        <h2 class="mb-3">Panel de Administración</h2>
        <p>Bienvenido, <strong><?= htmlspecialchars($_SESSION['user']['nombre']) ?></strong></p>

        <div class="row">
            <div class="col-md-4 mb-3">
            <div class="card border-warning shadow-sm">
                <div class="card-body">
                <h5 class="card-title">Productos</h5>
                <p class="card-text">Gestiona el catálogo de productos disponibles.</p>
                <a href="admin.php?action=productos" class="btn btn-warning">Ver productos</a>
                </div>
            </div>
            </div>

            <div class="col-md-4 mb-3">
            <div class="card border-info shadow-sm">
                <div class="card-body">
                <h5 class="card-title">Usuarios</h5>
                <p class="card-text">Administra cuentas y roles de usuarios.</p>
                <a href="#" class="btn btn-info disabled">Gestión de usuarios (próximamente)</a>
                </div>
            </div>
            </div>

            <div class="col-md-4 mb-3">
            <div class="card border-secondary shadow-sm">
                <div class="card-body">
                <h5 class="card-title">Cerrar sesión</h5>
                <p class="card-text">Finaliza tu sesión de administrador.</p>
                <a href="admin.php?action=login" class="btn btn-secondary">Salir</a>
                </div>
            </div>
            </div>
        </div>
        </div>  
        <?php include_once __DIR__ . '/../partials/footer.php'; ?>