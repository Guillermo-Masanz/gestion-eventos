<?php
    require_once realpath( __DIR__ . '/../Models/AdminPaneModel.php' );

    class AdminPaneController {

        public function index() {

            $AdminPaneModel = new AdminPanelModel();
            $events = $AdminPaneModel->getEvents();
            require_once realpath( __DIR__ . '/../Views/AdminPane.php' );
        }

    }

?>