<?php
    require_once __DIR__ . '/../db.php';

    class DeleteEstado {
        public static function execute($id) {
            $pdo = Database::getWriteInstance();
            $stmt = $pdo->prepare("DELETE FROM estados WHERE id = ?") 
            ->execute([$id]);
            return "success";
        }
    }
?>