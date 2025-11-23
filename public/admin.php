<?php
$pdo = require_once __DIR__ . '/../app/config/database.php';
require_once __DIR__ . '/../app/controllers/AuthController.php';
require_once __DIR__ . '/../app/controllers/AdminProductController.php';

$auth = new AuthController($pdo);
$adminProd = new AdminProductController($pdo);

$action = $_GET['action'] ?? 'dashboard';

// simple routing for admin pages
session_start();
$user = $_SESSION['user'] ?? null;

// allow login action without auth
if ($action === 'login') {
    $auth->login();
    exit;
}

if (!$user || ($user['rol'] ?? 'user') !== 'admin') {
    header('Location: admin.php?action=login');
    exit;
}

switch ($action) {
    case 'productos':
        $adminProd->listar();
        break;
    case 'crear':
        $adminProd->crear();
        break;
    case 'editar':
        $id = $_GET['id'] ?? null;
        $adminProd->editar($id);
        break;
    case 'eliminar':
        $id = $_GET['id'] ?? null;
        $adminProd->eliminar($id);
        break;
    default:
        include __DIR__ . '/../app/views/admin/dashboard.php';
}
