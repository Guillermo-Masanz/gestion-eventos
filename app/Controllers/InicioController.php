<?php
    require_once realpath( __DIR__ . '/../Models/InicioModel.php' );

    class InicioController {

        public function index() {

            $inicioModel = new InicioModel();
            $events = $inicioModel->getEvents();
            require_once realpath( __DIR__ . '/../Views/inicio.php' );

        }

    }

?>