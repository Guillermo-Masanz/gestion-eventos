<?php
    include 'Includes/Cabecera.php';
?>

<div class="goBack">
    <a href="index.php?page=adminPane&state="><i class='bx bx-left-arrow-alt'></i></a>
</div>

<div class="newEventFormContainer">
    <form action="index.php?page=adminPane&state=edit" method="post">
        <input type="hidden" name="eventID" value="<?php if(isset($event)) { echo $event[0]['id']; } ?>">
        <div class="newEventForm">
            <label for="nombre">Nombre del Evento</label>
            <span class="errorNewEventForm">
                <?php
                    if(isset($errores['eventName'])) { echo $errores['eventName']; }
                ?>
            </span>
            <br>
            <input type="text" name="nombre" id="nombre" value="<?php 
                if ( (isset($eventName) && !isset($errores['eventName'])) ) {
                    
                    echo $eventName;
                    
                } elseif ( isset($event[0]['name']) && !isset($errores) ) {

                    echo $event[0]['name'];

                }
            ?>" >

            <br><br>
            
            <label for="description">Descricpción</label>
            <span class="errorNewEventForm">
                <?php
                    if(isset($errores['eventDescription'])) { echo $errores['eventDescription']; }
                ?>
            </span>
            <br>
            <input type="text" name="description" id="description" value="<?php 
                if ( isset($eventDescription) && !isset($errores['eventDescription']) ) { 

                    echo $eventDescription;

                } elseif ( isset($event[0]['description']) && !isset($errores) ) {

                    echo $event[0]['description'];

                }
            ?>">

            <br><br>
            
            <label for="date">Fecha y Hora (YYYY-MM-DD HH:MM:SS)</label>
            <span class="errorNewEventForm">
                <?php
                    if(isset($errores['eventDate'])) { echo $errores['eventDate']; }
                ?>
            </span>
            <br>
            <input type="text" name="date" id="date" value="<?php 
                if (isset($_POST['date'])) {

                    echo htmlspecialchars($_POST['date']);

                } elseif (isset($event[0]['event_date']) && !isset($errores) ) {

                    echo htmlspecialchars($event[0]['event_date']);
                    
                }
            ?>" >

            <br><br>
            
            <label for="price">Precio</label>
            <span class="errorNewEventForm">
                <?php
                    if(isset($errores['eventPrice'])) { echo $errores['eventPrice']; }
                ?>
            </span>
            <br>
            <input type="text" name="price" id="price" value="<?php 
                if ( isset($eventPrice) && !isset($errores['eventPrice']) ) { 
                    
                    echo $eventPrice;

                } elseif ( isset($event[0]['ticket_price']) && !isset($errores) ) {

                    echo $event[0]['ticket_price'];

                }
            ?>" >

            <br><br>
            
            <label for="totalTickets">Total de entradas</label>
            <span class="errorNewEventForm">
                <?php
                    if(isset($errores['eventTotalTickets'])) { echo $errores['eventTotalTickets']; }
                ?>
            </span>
            <br>
            <input type="text" name="totalTickets" id="totalTickets" value="<?php 
                if ( isset($eventTotalTickets) && !isset($errores['eventTotalTickets']) ) { 
                    
                    echo $eventTotalTickets;

                } elseif ( isset($event[0]['total_tickets']) && !isset($errores) ) {

                    echo $event[0]['total_tickets'];

                }
            ?>" >

            <br><br>

            <input type="submit" value="Modificar Evento" name="Enviar">

        </div>
    </form>
</div>

<?php
    include 'Includes/Pie.php';
?>