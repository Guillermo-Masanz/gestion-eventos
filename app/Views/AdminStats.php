<?php
    include 'Includes/Cabecera.php';
?>

<div class="goBack">
    <a href="index.php?page=adminPane&state=adminPane"><i class='bx bx-left-arrow-alt'></i></a>
</div>
<div class="statsContainer">
    <?php
        if ( isset($event) ) {

            foreach ($event as $data) {

                $ocupiedPercentage = number_format( ( 100 * ( $data['tickets_sold'] / $data['total_tickets'] ) ), 2, ',', '.');
                $totalRevenue = number_format($data['ticket_price'] * $data['tickets_sold'], 2, ',', '.');

                echo '
                <h1>Estadísticas del evento '. $data['id'] .'</h1>
                <p><b>Entradas vendidas:</b> '. $data['tickets_sold'] .' de '. $data['total_tickets'] .'</p>
                <p><b>Porcentaje de ocupación:</b> '. $ocupiedPercentage .'%</p>
                <p><b>Ingreso total:</b> '. $totalRevenue .'€</p>
                ';

            }
            
        }
    ?>
</div>

<?php
    include 'Includes/Pie.php';
?>