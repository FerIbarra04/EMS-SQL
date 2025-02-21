<?php
    require_once __DIR__ . '/../db.php';

    class GetEstado {
        public static function execute($id) {
            $pdo = Database::getInstance();
            $stmt = $pdo->prepare("SELECT * FROM estados WHERE id = :id");
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);
        }
    }
?>