<?php
    include 'Includes/Cabecera.php';
?>

<div class="newEventFormContainer">
    <form action="index.php?page=newEvent" method="post">
        <div class="newEventForm">
            <label for="nombre">Nombre del Evento</label>
            <span class="errorNewEventForm">
                <?php
                    if(isset($errores['eventName'])) { echo $errores['eventName']; }
                ?>
            </span>
            <br>
            <input type="text" name="nombre" id="nombre" value="<?php 
                if ( isset($eventName) && !isset($errores['eventName']) ) { 
                    echo $eventName; 
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
                if ( isset($eventDate) && !isset($errores['eventDate']) ) { 
                    echo $eventDate; 
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
                } 
            ?>" >

            <br><br>

            <input type="submit" value="Agregar Evento" name="Enviar">

        </div>
    </form>
</div>

<?php
    include 'Includes/Pie.php';
?>