<?php
require_once __DIR__ . '/../config/Database.php';
require_once __DIR__ . '/../models/Usuario.php';
require_once __DIR__ . '/../models/Carrito.php';
require_once __DIR__ . '/../models/Producto.php';

// Detectar automáticamente la ruta base del proyecto
$basePath   = str_replace('\\', '/', dirname(__DIR__, 2)); // raíz del proyecto
$publicPath = $basePath . '/public';

// Si tu proyecto está en localhost/tienda_solar/public
define('BASE_URL', '/tienda_solar/public/');

// --- Middleware para proteger rutas admin ---
if (!function_exists('requireAdmin')) {
    function requireAdmin() {
        if (!isset($_SESSION['rol']) || $_SESSION['rol'] !== 'admin') {
            header('Location: ' . BASE_URL . 'index.php?page=login&return=admin');
            exit;
        }
    }
}

// --- Helper para renderizar vistas con layouts ---
function renderView($view, $data = [], $layout = 'layout') {
    if (!is_array($data)) {
        $data = [];
    }

    extract($data);

    ob_start();
    include __DIR__ . '/../views/' . $view . '.php';
    $content = ob_get_clean();

    include __DIR__ . "/../views/" . $layout . ".php";
}