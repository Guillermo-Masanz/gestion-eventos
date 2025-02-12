<?php
    require_once realpath( __DIR__ . '/../Core/Database.php' );

    class NewEventModel {

        private $db;

        public function __construct() {
            $this->db = new Database();
        }

        public function addEvent($Nombre, $Description, $Fecha, $TotalEntradas, $PrecioEntrada) {
            $Nombre = $this->db->escape($Nombre);
            $Description = $this->db->escape($Description);
            $Fecha = $this->db->escape($Fecha);
            $TotalEntradas = $this->db->escape($TotalEntradas);
            $PrecioEntrada = $this->db->escape($PrecioEntrada);

            $this->db->query("INSERT INTO events(name, description, event_date, ticket_price, total_tickets) VALUES ('$Nombre', '$Description', '$Fecha', $PrecioEntrada, $TotalEntradas);");

        }
    }
?>