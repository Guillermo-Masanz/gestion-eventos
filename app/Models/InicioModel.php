<?php
    require_once realpath( __DIR__ . '/../Core/Database.php' );

    class InicioModel {

        private $db;

        public function __construct() {
            $this->db = new Database();
        }

        public function getEvents() {
            $events = $this->db->query('SELECT * FROM events');
            return $events->fetch_all(MYSQLI_ASSOC);
        }

    }

?>