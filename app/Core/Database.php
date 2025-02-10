<?php
    require_once realpath( __DIR__ . '/../Config/Config.php' );

    class Database {

        private $db;

        public function __construct() {

            try {
                $this->db = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_DATABASE);
            } catch (Exception $e) {
                header('Location: index.php?page=ServiceDown');
                exit();
            }
        }

        public function query($sql) {
            return $this->db->query($sql);
        }

        public function escape($string) {
            return $this->db->escape_string($string);
        }

    }

?>