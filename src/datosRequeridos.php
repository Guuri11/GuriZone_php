<?php
declare(strict_types=1);
/**
 * @param $campos
 * @param $camposRequeridos
 * @return bool
 */
function datosRequeridos(array $camposRequeridos):bool{
    $validar = true;
    // por cada valor del campo comprobar si esta vacio o no.
    foreach ($camposRequeridos as $campo => $valor){
        // podria no tener foto... y descatalogado si es 0 lo considera como vacio
        if(empty($valor) && $campo!='urlfoto' && $campo!='descatalogado'){
            echo "<p><strong>ERROR: Campo requerido vacio: </strong><em>$campo</em>";
            if($validar === true)       // SI HA HABIDO ERROR Y SIGUE VERDADERO CAMBIARLO A FALSO
                $validar = false;
        }
    }

    return $validar;        // devuelve el estado de la validacion
}