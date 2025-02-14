<?php
    require_once realpath(__DIR__ . '/../Models/AdminPaneModel.php');
    require_once realpath(__DIR__ . '/../Config/AdminUsers.php' );

    class AdminPaneController {
    
        public function index() {
            $AdminPaneModel = new AdminPanelModel();

            if ( isset($_GET['state']) ) {
                
                switch ($_GET['state']) {
                    
                    case 'edit':
                        $this->editEvent();
                        break;

                    case 'delete':
                        $this->deleteEvent();
                        break;

                    case 'new':
                        $this->newEvent();
                        break;

                    case 'stats':
                        $this->showEstadisticas();
                        break;

                    case 'loginPane':
                        $this->loginPane();
                        break;
                        
                    default:
                        $this->showEvents();
                        break;
                }

            } else {

                $this->loginPane();

            }
        }

        /*
            ******************************************
                ESTADISTICAS EVENTOS EN ADMIN PANE
            ******************************************
        */
        private function loginPane() {
            if ( $_SERVER['REQUEST_METHOD'] == 'POST' ) {

                $errores = [];

                $username = sanearCampo($_POST['username']);
                $password = sanearCampo($_POST['password']);
                $errores['adminUsername'] = ( $username != SITE_ADMIN_USER ) ? '* Usuario no correcto' : null;
                $errores['adminPassword'] = ( $password != SITE_ADMIN_PASS ) ? '* Contraseña no correcta' : null;

                if ( empty(array_filter($errores)) ) {
                    
                    header('Location: index.php?page=adminPane&state=');
                    exit();

                } else {

                    require_once realpath(__DIR__ . '/../Views/AdminPaneLogin.php');

                }

            }

            require_once realpath(__DIR__ . '/../Views/AdminPaneLogin.php');
        }
        
        /*
            *************************************
                MOSTRAR EVENTOS EN ADMIN PANE
            *************************************
        */
        private function showEvents() {
            $AdminPaneModel = new AdminPanelModel();
            $events = $AdminPaneModel->getEvents();
            require_once realpath(__DIR__ . '/../Views/AdminPane.php');
        }

        /*
            *************************************
                BORRAR EVENTOS EN ADMIN PANE
            *************************************
        */
        private function deleteEvent() {
            if (isset($_GET['eventID'])) {
                $AdminPaneModel = new AdminPanelModel();
                $AdminPaneModel->deleteEvent($_GET['eventID']);
            }
            header("Location: index.php?page=adminPane&state=");
        }

        /*
            *************************************
                EDITAR EVENTOS EN ADMIN PANE
            *************************************
        */
        private function editEvent() {

            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $errores = [];
            
                $eventID = $_POST['eventID'] ?? null ;
                $eventName = sanearCampo($_POST['nombre']);
                $eventDescription = sanearCampo($_POST['description']);
                $eventDate = sanearCampo($_POST['date']);
                $eventPrice = sanearCampo($_POST['price']);
                $eventTotalTickets = sanearCampo($_POST['totalTickets']);
            
                $errores['eventName'] = validacionValor($eventName, 'texto');
                $errores['eventDescription'] = validacionValor($eventDescription, 'texto');
                $errores['eventDate'] = validacionValor($eventDate, 'fecha');
                $errores['eventPrice'] = validacionValor($eventPrice, 'numero');
                $errores['eventTotalTickets'] = validacionValor($eventTotalTickets, 'numero');
            
                
                if (empty(array_filter($errores))) {
                    
                    $event = new AdminPanelModel();
                    $event->updateEvent($eventID, $eventName, $eventDescription, $eventDate, $eventTotalTickets, $eventPrice);
                    header('Location: index.php?page=adminPane&state=');
                    exit();

                } else {
                    
                    $AdminPaneModel = new AdminPanelModel();
                    $event = $AdminPaneModel->getEventById($eventID);
                    require_once realpath(__DIR__ . '/../Views/EditEventForm.php');
                    exit();

                }
            }
            
            $AdminPaneModel = new AdminPanelModel();
            $event = $AdminPaneModel->getEventById($_GET['eventID'] ?? null);
            require_once realpath(__DIR__ . '/../Views/EditEventForm.php');

        }

        
        /*
            *************************************
                CREAR EVENTOS EN ADMIN PANE
            *************************************
        */
        private function newEvent() {
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $errores = [];

                $eventName = sanearCampo($_POST['nombre']);
                $eventDescription = sanearCampo($_POST['description']);
                $eventDate = sanearCampo($_POST['date']);
                $eventPrice = sanearCampo($_POST['price']);
                $eventTotalTickets = sanearCampo($_POST['totalTickets']);

                $errores['eventName'] = validacionValor($eventName, 'texto');
                $errores['eventDescription'] = validacionValor($eventDescription, 'texto');
                $errores['eventDate'] = validacionValor($eventDate, 'fecha');
                $errores['eventPrice'] = validacionValor($eventPrice, 'numero');
                $errores['eventTotalTickets'] = validacionValor($eventTotalTickets, 'numero');

                if ( empty(array_filter($errores)) ) {

                    $event = new AdminPanelModel();
                    $event->createEvent($eventName, $eventDescription, $eventDate, $eventTotalTickets, $eventPrice);
                    header('Location: index.php?page=adminPane&state=');
                    exit();

                } else {

                    require_once realpath( __DIR__ . '/../Views/NewEventForm.php' );

                }
            }
            
            require_once realpath(__DIR__ . '/../Views/NewEventForm.php');
        }

        /*
            ******************************************
                ESTADISTICAS EVENTOS EN ADMIN PANE
            ******************************************
        */
        private function showEstadisticas() {
            $event = new AdminPanelModel();
            $event = $event->getEventById($_GET['eventID']);
            require_once realpath( __DIR__ . '/../Views/AdminStats.php');
        }
        
    }


?>