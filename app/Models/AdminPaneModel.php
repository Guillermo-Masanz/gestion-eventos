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

        public function getEventById($id) {
            $id = $this->db->escape($id);
            $event = $this->db->query("SELECT * FROM events WHERE id = $id;");
            return $event->fetch_all(MYSQLI_ASSOC);
        }

        public function deleteEvent($id) {
            $id = $this->db->escape($id);
            $this->db->query("DELETE FROM events WHERE id = $id");
        }

        public function createEvent($Nombre, $Description, $Fecha, $TotalEntradas, $PrecioEntrada) {
            $Nombre = $this->db->escape($Nombre);
            $Description = $this->db->escape($Description);
            $Fecha = $this->db->escape($Fecha);
            $TotalEntradas = $this->db->escape($TotalEntradas);
            $PrecioEntrada = $this->db->escape($PrecioEntrada);

            $this->db->query("INSERT INTO events(name, description, event_date, ticket_price, total_tickets) VALUES ('$Nombre', '$Description', '$Fecha', $PrecioEntrada, $TotalEntradas);");

        }
        
        public function updateEvent($eventID, $Nombre, $Description, $Fecha, $TotalEntradas, $PrecioEntrada) {
            $eventID = $this->db->escape($eventID);
            $Nombre = $this->db->escape($Nombre);
            $Description = $this->db->escape($Description);
            $Fecha = $this->db->escape($Fecha);
            $TotalEntradas = $this->db->escape($TotalEntradas);
            $PrecioEntrada = $this->db->escape($PrecioEntrada);
            $this->db->query("UPDATE events SET name = '$Nombre', description = '$Description', event_date = '$Fecha', total_tickets = $TotalEntradas, ticket_price = $PrecioEntrada WHERE id = $eventID");
        }

    }

?>