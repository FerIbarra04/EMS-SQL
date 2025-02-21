<?php
    require_once __DIR__ . '/../db.php';

    class AddEstado {
        public static function execute($nombre, $temperatura, $viento, $humedad) {
            try {
                $pdo = Database::getInstance();
                $stmt = $pdo->prepare("INSERT INTO estados (nombre, temperatura, viento, humedad) VALUES (?, ?, ?, ?)");
                return $stmt->execute([$nombre, $temperatura, $viento, $humedad]);
            } catch (PDOException $e) {
                return false;
            }
        }
    }
?>
