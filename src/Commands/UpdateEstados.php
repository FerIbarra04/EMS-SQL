<?php
    require_once __DIR__ . '/../db.php';

    class UpdateEstado {
        public static function execute($id, $nombre, $temperatura, $viento, $humedad) {
            $pdo = Database::getWriteInstance();
            $stmt = $pdo->prepare("UPDATE estados SET nombre = ?, temperatura = ?, viento = ?, humedad = ? WHERE id = ?")
            ->execute([$nombre, $temperatura, $viento, $humedad, $id]);
            return "success";
        }
    }
?>