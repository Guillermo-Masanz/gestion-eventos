<?php
    include 'Includes/Cabecera.php';
?>

<div class="festival">
    <?php
        if ( isset($CustomerFestival) ) {

            foreach ( $CustomerFestival as $campo ) {

                $ticketsAvb = $campo['total_tickets'] - $campo['tickets_sold'];

                echo '
                <h1>'. $campo['name'] .'</h1>
                <p>Fecha: '. $campo['event_date'] .'</p>
                <p>Precio: '. $campo['ticket_price'] .'€</p>
                <p>Entradas disponibles: '. $ticketsAvb .'</p>
                ';
            }
            
        }
    ?>
    <h2>Reservar Entradas</h2>

    <div class="festivalFormContainer">

        <?php 
        
            echo "<form action='index.php?page=festival&festival_ID=". $_GET['festival_ID'] ."' method='post'>"

        ?>
            <div class="festivalForm">
                <label for="nombre">Nombre: </label>
                <br>
                <input type="text" name="nombre" id="nombre" value="<?php if(isset($customerName)){ echo $customerName; } ?>">
                <br>
                <span class="errorFestivalForm">
                    <?php
                        if (isset($errores['customerName'])) { echo $errores['customerName']; }
                    ?>
                </span>
                
                <br> <br>

                <label for="cantidad">Cantidad de entradas: </label>
                <br>
                <input type="text" name="cantidad" id="cantidad" value="<?php if(isset($customerQuantity)){ echo $customerQuantity; } ?>">
                <br>
                <span class="errorFestivalForm">
                    <?php
                        if (isset($errores['customerQuantity'])) { echo $errores['customerQuantity']; }
                    ?>
                </span>

                <br><br>

                <input type="submit" name="EnviarFestival" value="Comprar">
            </div>
        </form>
    </div>
</div>

<?php
    include 'Includes/Pie.php';
?>