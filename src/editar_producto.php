<?php
declare(strict_types=1);
require_once('./src/datosRequeridos.php');

/**
 * @param $datos
 * @param $db
 * @param $productoEditado
 * @return array
 */
function editarProducto(array $datos,DB $db,Producto $productoEditado):array
{
    $errores = [];
    $datos = validacionInputsProducto($datos);
    $errores = camposRequeridos($datos);
    if (empty($errores)) {        // si los datos a sanear y validar = OK

        /* Subir producto a la base de datos*/
        $productosConsulta = new Product_model($db);

        // 1.Obtener datos saneandos
        $producto = $productosConsulta->getData();
        $producto->setIdProd($productoEditado->getIdProd());
        $producto->setNumVentasProd($productoEditado->getNumVentasProd());

        // 2.Validar datos
        $errores = $productosConsulta->validate($producto);

        // 3. Ejecutar insercion a la BBDD
        if (empty($errores)){
            $resultado = $productosConsulta->update($producto);     // subirlo a la ddbb
            if ($resultado === false)
                $errores[]="Error al modificar producto";
            return $errores;
        }
        else{
            return $errores;
        }
    }
    return $errores;
}

/**
 * @return array
 */
function datos():array {    // datos de $_POST
    $datos = $_POST;
    return $datos;
}

/**
 * @param $datos
 * @return array
 */
function validacionInputsProducto($datos):array {
    $datos['categoria'] = filter_input(INPUT_POST,'categoria',FILTER_VALIDATE_INT);
    $datos['subcategoria'] = filter_input(INPUT_POST,'subcategoria',FILTER_VALIDATE_INT);
    $datos['stock'] = filter_input(INPUT_POST,'stock',FILTER_VALIDATE_INT);

    return $datos;
}

/**
 * @param $campos
 * @return array
 */
function camposRequeridos($campos):array
{
    $requeridos = [];
    foreach ($campos as $campo => $valor) {       // por cada valor del campo comprobar si esta vacio o no.
        if (empty($valor) && $campo != 'urlfoto' && $campo != 'descatalogado') { // podria no tener foto... y descatalogado si es 0 lo considera como vacio
            $requeridos[] = "ERROR: Campo requerido vacio: " . $campo;
        }
    }
    return $requeridos;
}
