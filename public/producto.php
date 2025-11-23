<?php
$pdo = require_once __DIR__ . '/../app/config/database.php';
require_once __DIR__ . '/../app/controllers/ProductoController.php';

$id = $_GET['id'] ?? null;
$controller = new ProductoController($pdo);
$controller->ver($id);
