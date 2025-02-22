<?php
    class Database {
        private static $write = null;
        private static $read = null;
        private $pdo;

        private function __construct() {
            $this->pdo = new PDO("sqlite:" . __DIR__ . "../db/db.sqlite");
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }

        public static function getWriteInstance() {
            if (self::$write === null) {
                self::$write = new Database();
            }
            return self::$write->pdo;
        }

        public static function getReadInstance() {
            if (self::$read === null) {
                self::$read = new Database();
            }
            return self::$read->pdo;
        }
    }
?>
