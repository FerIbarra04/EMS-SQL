<?php
    require 'dbB.php.';

    $pdo = Database::getInstance();

    $pdo->exec("CREATE TABLE IF NOT EXISTS estados (
        id INTEGER PRIMARY KEY AUTOINCREMENT,
        nombre TEXT UNIQUE NOT NULL,
        temperatura REAL NOT NULL,
        viento REAL NOT NULL,
        humedad REAL NOT NULL
    )");

    echo "Base de datos y tabla 'estados' creadas correctamente.";
?>
