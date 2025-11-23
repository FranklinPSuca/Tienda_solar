<?php
$title = 'Admin - Login';
ob_start();
?>
<h2>Login Admin</h2>
<?php if (!empty($error)): ?><div class="alert alert-danger"><?= htmlspecialchars($error) ?></div><?php endif; ?>
<form method="post">
  <input name="email" class="form-control mb-2" placeholder="Email">
  <input name="password" type="password" class="form-control mb-2" placeholder="Password">
  <button class="btn btn-primary">Entrar</button>
</form>
<?php
$content = ob_get_clean();
include __DIR__ . '/../layout.php';
