<?php
    require_once realpath( __DIR__ . '/../Core/Database.php' );

    class AdminPanelModel {

        private $db;

        public function __construct() {
            $this->db = new Database();
        }

        public function getEvents(){
            $events = $this->db->query('SELECT * FROM events;');
            return $events->fetch_all(MYSQLI_ASSOC);
        }

        public function getEventsById( $id ) {
            $id = $this->db->escape($id);
            $event = $this->db->query("SELECT * FROM events WHERE id = $id;");
            return $event->fetch_all(MYSQLI_ASSOC);
        }

        public function deleteEvent( $id ) {
            $id = $this->db->escape($id);
            $this->db->query("DELETE FROM events WHERE id = $id");
        }

    }

?>