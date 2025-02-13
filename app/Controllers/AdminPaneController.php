<?php
    require_once realpath(__DIR__ . '/../Models/AdminPaneModel.php');

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

                    default:
                        $this->showEvents();
                }
            } else {

                $this->showEvents();

            }
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
            header("Location: index.php?page=adminPane");
        }

        /*
            *************************************
                EDITAR EVENTOS EN ADMIN PANE
            *************************************
        */
        private function editEvent() {

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
                    $event->updateEvent($eventName, $eventDescription, $eventDate, $eventTotalTickets, $eventPrice);
                    header('Location: index.php?page=adminPane');
                    exit();

                } else {

                    require_once realpath( __DIR__ . '/../Views/EditEventForm.php' );

                }
            }

            $AdminPaneModel = new AdminPanelModel();
            $event = $AdminPaneModel->getEventsById($_GET['eventID']);
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
                    header('Location: index.php?page=adminPane');
                    exit();

                } else {

                    require_once realpath( __DIR__ . '/../Views/NewEventForm.php' );

                }
            }
            
            require_once realpath(__DIR__ . '/../Views/NewEventForm.php');
        }
    }


?>