<?php
    class Router {

        public function route($page) { 

            switch ( $page ) {

                case 'inicio':
                    require_once realpath( __DIR__ . '/../Controllers/InicioController.php' );
                    $controller = new InicioController();
                    $controller->index();
                    break;

                case 'festival':
                    require_once realpath( __DIR__ . '/../Controllers/CustomerFestivalController.php' );
                    $controller = new CustomerFestivalController();
                    $controller->index();
                    break;

                case 'adminPane':
                    require_once realpath( __DIR__ . '/../Controllers/AdminPaneController.php' );
                    $controller = new AdminPaneController();
                    $controller->index();
                    break;

                case 'newEvent':
                    require_once realpath( __DIR__ . '/../Controllers/NewEventController.php' );
                    $controller = new NewEventController();
                    $controller->index();
                    break;

                case 'statePane':
                    require_once realpath( __DIR__ . '/../Views/StatsPage.php' );
                    break;

                case 'ServiceDown':
                    require_once realpath( __DIR__ . '/../Views/ServiceDown.php' );
                    break;

                default:
                    require_once realpath( __DIR__ . '/../Views/error.php' );
                    break;
            }

        }
    }
?>