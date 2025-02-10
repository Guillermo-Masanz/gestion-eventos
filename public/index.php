<?php
    require_once realpath( __DIR__ . '/../app/Core/Router.php' );
    require_once realpath( __DIR__ . '/../app/Utils/Functions.php' );

    $page = (isset($_GET['page'])) ? $_GET['page'] : 'inicio';

    $router = new Router();
    $router->route($page);

?>