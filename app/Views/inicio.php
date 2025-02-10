<?php
    include 'Includes/Cabecera.php';
?>

<h1 class="titulo">Eventos Disponibles</h1>
<div class="tarjetas">
<?php
    if ( isset($events) ) {

        foreach ( $events as $event ) {

            $ticketsAvb = $event['total_tickets'] - $event['tickets_sold'];

            echo '
            <div class="tarjetaContainer">
                <a href="index.php?page=festival&festival_ID='. $event['id'] .'" class="tarjeta">
                    <h2>'. $event['name'] .'</h2>
                    <p class="ticketsAvb">Tickets disponibles: '. $ticketsAvb .'</p>
                    <p class="date">Fecha: '. $event['event_date'] .'</p>
                </a>
            </div>
            ';

        }
    }
?>
</div>

<?php
    include 'Includes/Pie.php';
?>