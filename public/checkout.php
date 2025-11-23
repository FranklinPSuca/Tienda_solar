<?php
$pdo = require_once __DIR__ . '/../app/config/database.php';
require_once __DIR__ . '/../app/controllers/CheckoutController.php';

$controller = new CheckoutController($pdo);
$controller->procesar();
