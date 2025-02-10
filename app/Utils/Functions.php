<?php
    function verArray($array) {
        echo "<pre>";
        print_r($array);
        echo "</pre>";
    }

    function sanearCampo($campo) {
        return htmlspecialchars(trim($campo));
    }

    function validacionValor($valor, $tipo) {

        switch ($tipo) {

            case 'texto':
                if ( empty($valor) ) {
                    return "* Debe introducir texto en el campo";
                }
                break;

            case 'nuemero':
                if ( !is_numeric($valor) ) {
                    return "* El campo debe ser un número";
                }
                break;
                
            default:
                break;
        }

    }
?>