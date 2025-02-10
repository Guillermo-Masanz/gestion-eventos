<?php
    require_once ( __DIR__ . '/../Models/CustomerFestivalModel.php' );
    class CustomerFestivalController {

        public function index() {

            if ( $_SERVER['REQUEST_METHOD'] == 'POST' && isset( $_POST['EnviarFestival'] ) ) {
                
                $errores = [];

                $customerName = sanearCampo($_POST['nombre']);
                $customerQuantity = sanearCampo($_POST['cantidad']);

                

            } else {
                
                if ( isset( $_GET['festival_ID'] ) ) {
    
                    $CustomerFestivalModel = new CustomerFestivalModel();
                    $CustomerFestival = $CustomerFestivalModel->getCustomerFestival($_GET['festival_ID']);
                    require_once realpath( __DIR__ . '/../Views/CustomerFest.php' );
    
                }
            }
        }

    }
?>