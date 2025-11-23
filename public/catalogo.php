<?php
$pdo = require_once __DIR__ . '/../app/config/database.php';
require_once __DIR__ . '/../app/controllers/CatalogoController.php';

$controller = new CatalogoController($pdo);
$controller->index();
