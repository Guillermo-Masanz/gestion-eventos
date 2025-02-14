<?php
    include 'Includes/Cabecera.php';
?>

<div class="goBack">
    <a href="index.php?page=inicio"><i class='bx bx-left-arrow-alt'></i></a>
</div>


<div class="adminForm">
    <form action="index.php?page=adminPane" method="post">
        <label for="username">Nombre de usuario</label>
        <span class="loginErrors">
            <?php
                if ( isset($errores['adminUsername']) ) {
                    echo $errores['adminUsername'];
                }
            ?>
        </span>
        <br>
        <input type="text" name="username" id="username">
        <br>

        <label for="password">Contraseña</label>
        <span class="loginErrors">
            <?php
                if ( isset($errores['adminPassword']) ) {
                    echo $errores['adminPassword'];
                }
            ?>
        </span>
        <br>
        <input type="password" name="password" id="password">
        <br><br>
        <input type="submit" value="Enviar" name="enviar" >
    </form>
</div>

<?php
    include 'Includes/Pie.php';
?>