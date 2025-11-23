<?php
$pdo = require_once __DIR__ . '/../app/config/database.php';
require_once __DIR__ . '/../app/controllers/CarritoController.php';

$action = $_GET['action'] ?? 'ver';
$controller = new CarritoController($pdo);

if ($action === 'agregar' && $_SERVER['REQUEST_METHOD'] === 'POST') {
    $controller->agregar();
} elseif ($action === 'vaciar' && $_SERVER['REQUEST_METHOD'] === 'POST') {
    $controller->vaciar();
    exit;
} else {
    $controller->ver();
}