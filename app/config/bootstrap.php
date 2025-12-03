<?php
require_once __DIR__ . '/../config/Database.php';
require_once __DIR__ . '/../models/Usuario.php';
require_once __DIR__ . '/../models/Carrito.php';
require_once __DIR__ . '/../models/Producto.php';

// Detectar automáticamente la ruta base del proyecto
$basePath = str_replace('\\', '/', dirname(__DIR__, 2)); // sube hasta raíz del proyecto
$publicPath = $basePath . '/public';

// Si tu proyecto está en localhost/tienda_solar/public
define('BASE_URL', '/tienda_solar/public/');

function renderView($view, $data = []) {
    if (!is_array($data)) {
        $data = [];
    }

    extract($data);

    ob_start();
    include __DIR__ . '/../views/' . $view . '.php';
    $content = ob_get_clean();

    include __DIR__ . "/../views/layout.php";
}