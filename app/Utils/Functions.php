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
                } elseif ( strlen($valor ) > 255 ) {
                    return "* No se pueden introducir más de 255 cáracteres";
                }
                break;

            case 'numero':
                if ( !is_numeric($valor) && $valor < 1 ) {
                    return "* El campo debe ser un número mayor a 0";
                }
                break;
                
            default:
                break;
        }

    }
?>