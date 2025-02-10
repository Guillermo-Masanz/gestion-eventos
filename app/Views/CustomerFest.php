<?php
    include 'Includes/Cabecera.php';
?>

<div class="festival">
    <h1>RUEBA DE DADS</h1>
    <p>Fecha: 2025-06-25 12:00:00</p>
    <p>Precio: 20,00€</p>
    <p>Entradas disponibles: 23000</p>
    <h2>Reservar Entradas</h2>

    <div class="festivalFormContainer">
        <form action="index.php?page=festival&festival_ID=<?php  ?>" method="post">
            <div class="festivalForm">
                <label for="nombre">Nombre: </label>
                <br>
                <input type="text" name="nombre" id="nombre" value="<?php if(isset($nombreFestival)) ?>">
                <br>
                <span class="errorFestivalForm">
                    <?php
                        if (isset($errores['customerName'])) { echo $errores['customerName']; }
                    ?>
                </span>

                <br> <br>

                <label for="cantidad">Cantidad de entradas: </label>
                <br>
                <input type="text" name="cantidad" id="cantidad">
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