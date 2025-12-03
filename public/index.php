<?php
session_start();

define('BASE_PATH', dirname(__DIR__));        // C:\xampp\htdocs\tienda_solar
define('APP_PATH', BASE_PATH . '/app');       // app
define('VIEW_PATH', APP_PATH . '/views/');    // app/views/

require_once __DIR__ . '/../app/config/bootstrap.php';

$pdo = require __DIR__ . '/../app/config/database.php';

$page = $_GET['page'] ?? 'home';

switch ($page) {
    case 'home':
        require_once __DIR__ . '/../app/controllers/HomeController.php';
        $controller = new HomeController($pdo);
        $controller->index();
        break;

    case 'catalogo':
        require_once __DIR__ . '/../app/controllers/CatalogoController.php';
        $controller = new CatalogoController($pdo);
        $controller->index();
        break;

    case 'producto':
        require_once __DIR__ . '/../app/controllers/ProductoController.php';
        $id = $_GET['id'] ?? null;
        $controller = new ProductoController($pdo);
        $controller->detalle($id);
        break;

    case 'carrito':
        require_once __DIR__ . '/../app/controllers/CarritoController.php';

        $controller = new CarritoController($pdo);
        $action     = $_GET['action'] ?? 'ver';

        // --- ACCIONES DEL CARRITO ---
        if ($action === 'agregar' && $_SERVER['REQUEST_METHOD'] === 'POST') {

            $productoId = $_POST['producto_id'] ?? null;
            $cantidad   = $_POST['cantidad'] ?? 1;

            $controller->agregar($productoId, $cantidad);
            exit;

        } elseif ($action === 'eliminar') {

            $productoId = $_GET['id'] ?? null;
            $controller->eliminar($productoId);
            exit;

        } elseif ($action === 'vaciar') {

            $controller->vaciar();
            exit;

        } else {

            $controller->index(); // método correcto
            exit;

        }

        break;

    case 'checkout':
        require_once __DIR__ . '/../app/controllers/CheckoutController.php';
        $controller = new CheckoutController($pdo);

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $controller->procesar();
        } else {
            $controller->index();
        }
        break;
    case 'login':
        require_once __DIR__ . '/../app/controllers/LoginController.php';
        $controller = new LoginController($pdo);

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $controller->auth();
        } else {
            $controller->index();
        }
        break;
    case 'logout':
        require_once __DIR__ . '/../app/controllers/LoginController.php';
        $controller = new LoginController($pdo);
        $controller->logout();
        break;

    case 'registro':
        require_once __DIR__ . '/../app/controllers/RegistroController.php';
        $controller = new RegistroController($pdo);
        $controller->index();
        break;

    case 'registro_crear':
        require_once __DIR__ . '/../app/controllers/RegistroController.php';
        $controller = new RegistroController($pdo);
        $controller->crear();
        break;
    }