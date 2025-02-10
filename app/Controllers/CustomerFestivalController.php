<?php
    require_once ( __DIR__ . '/../Models/CustomerFestivalModel.php' );
    class CustomerFestivalController {

        public function index() {

            if ( isset( $_GET['festival_ID'] ) ) {
    
                if ( $_SERVER['REQUEST_METHOD'] == 'POST' && isset( $_POST['EnviarFestival'] ) ) {
                
                    $errores = [];
    
                    $customerName = sanearCampo($_POST['nombre']);
                    $customerQuantity = sanearCampo($_POST['cantidad']);
                    $errores['customerName'] = validacionValor($customerName, 'texto');
                    $errores['customerQuantity'] = validacionValor($customerQuantity, 'numero');
                    
                    if ( empty($errores) ) {
                        
                        $CustomerFestivalModel = new CustomerFestivalModel();
                        $CustomerFestivalModel->getTickets($_GET['festival_ID'], $customerName, $customerQuantity);
                        header('Location: index.php?page=inicio');
    
                    } else {
    
                        $CustomerFestivalModel = new CustomerFestivalModel();
                        $CustomerFestival = $CustomerFestivalModel->getCustomerFestival($_GET['festival_ID']);
                        require_once realpath( __DIR__ . '/../Views/CustomerFest.php' );
    
                    }
                    
    
                } else {
                    
                    $CustomerFestivalModel = new CustomerFestivalModel();
                    $CustomerFestival = $CustomerFestivalModel->getCustomerFestival($_GET['festival_ID']);
                    require_once realpath( __DIR__ . '/../Views/CustomerFest.php' );
                }
            }
        }

    }
?>