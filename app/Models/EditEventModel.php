<?php
    require_once realpath( __DIR__ . '/../Core/Database.php' );

    class EditEventModel {

        private $db;

        public function __construct() {
            $this->db = new Database();
        }

        public function getEvent( $event_id ) {
            $event_id = $this->db->escape( $event_id );
            $evento = $this->db->query("SELECT * FROM events WHERE id = $event_id");
            return $evento->fetch_all(MYSQLI_ASSOC);
        }

        public function editEvent ( $event_id ) {
            
        }

    }
?>