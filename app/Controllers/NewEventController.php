<?php
    require_once realpath( __DIR__ . '/../Models/NewEventModel.php' );

    class NewEventController {

        public function index() {

            if ( $_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['Enviar']) ) {

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

                    $event = new NewEventModel();
                    $event->addEvent($eventName, $eventDescription, $eventDate, $eventTotalTickets, $eventPrice);
                    header('Location: index.php?page=adminPane');

                } else {

                    require_once realpath( __DIR__ . '/../Views/NewEventForm.php' );

                }

            } else {

                require_once realpath( __DIR__ . '/../Views/NewEventForm.php' );

            }

        }

    }
?>