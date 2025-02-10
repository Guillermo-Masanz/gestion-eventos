<?php
    require_once ( __DIR__ . '/../Core/Database.php' );
    class CustomerFestivalModel {

        private $db;

        public function __construct() {
            $this->db = new Database();
        }

        public function getCustomerFestival($festID) {
            $fest = $this->db->query("SELECT * FROM events WHERE id = $festID");
            return $fest->fetch_all(MYSQLI_ASSOC);
        }

        public function getTickets($festID, $name, $quantity) {
            $name = $this->db->escape($name);
            $quantity = $this->db->escape($quantity);

            $this->db->query("INSERT INTO reservations(`buyer_name`. `event_id`, `quantity`) VALUES ('$name', $festID, $quantity)");
            $this->db->query("UPDATE events SET total_tickets = total_tickets - $quantity, tickets_sold = tickets_sold + $quantity WHERE id = $festID");
        }

    }
?>