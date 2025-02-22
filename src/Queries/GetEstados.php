<?php
    require_once __DIR__ . '/../db.php';

    class GetEstados {
        public static function execute() {
            $pdo = Database::getReadInstance();
            $stmt = $pdo->query("SELECT * FROM estados");
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
    }
?>