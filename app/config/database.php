<?php
$DB_HOST = 'localhost';
$DB_NAME = 'tienda_solar';
$DB_USER = 'root';
$DB_PASS = '';
$DB_CHAR = 'utf8mb4';

try {
    $pdo = new PDO(
        "mysql:host=$DB_HOST;dbname=$DB_NAME;charset=$DB_CHAR",
        $DB_USER,
        $DB_PASS,
        [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES => false,
        ]
    );
} catch (PDOException $e) {
    // Mostrar error y detener ejecución
    die('❌ Error de conexión a la base de datos: ' . $e->getMessage());
}

// Siempre devolver el objeto PDO
return $pdo;