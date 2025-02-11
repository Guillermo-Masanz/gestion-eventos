<?php
    include 'Includes/Cabecera.php';
?>

<div class="adminPaneTable">
    <table>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Fecha</th>
            <th>Entradas Vendidas</th>
            <th>Total Entradas</th>
            <th>Acciones</th>
            <th class="agregar"><a href="index.php?page=newEvent"><i class='bx bx-plus'></i></a></th>
        </tr>

        <?php
            if ( isset($events) ) {
                foreach ( $events as $event ) {
                    echo '
                    <tr>
                        <td>'.$event['id'].'</td>
                        <td>'.$event['name'].'</td>
                        <td>'.$event['event_date'].'</td>
                        <td>'.$event['tickets_sold'].'</td>
                        <td>'.$event['total_tickets'].'</td>
                        <td>
                            <a href="index.php?page=adminPane&eventID=\''. $event['id'] .'\'">Editar</a>
                            <a href="index.php?page=adminPane&eventID=\''. $event['id'] .'\'">Eliminar</a>
                            <a href="index.php?page=adminPane&eventID=\''. $event['id'] .'\'">Ver estadísticas</a>
                        </td>
                    </tr>
                    ';
                }
            }
        ?>

    </table>
</div>

<?php
    include 'Includes/Pie.php';
?>