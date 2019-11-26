<?php
declare(strict_types=1);
/**
 * @param $datos
 * @param $db
 * @return bool
 */
function crearProducto(array $datos,DB $db):array {
    $errores = [];
    // validar los campos que no son cadenas
    $datos = validacionInputsProducto($datos);
    // si los datos a sanear y validar = OK
    $errores = camposRequeridos($datos);
    if (empty($errores)){
        $producto = new Producto();
        // indicar foto por defecto si no existe dicha imagen
        if (empty($producto->getFotoProd()))
            $producto->setFotoProd('/imgs/productos/default_product_image.png');

        /* Subir producto a la base de datos*/
        $productosConsulta = new ProductoModel($db);
        // 1.Obtener datos saneandos
        $producto = $productosConsulta->getData();

        // 2.Validar datos
        $errores = $productosConsulta->validateCrearProducto($producto);

        // 3. Ejecutar insercion a la BBDD
        if (empty($errores)){
            $resultado = $productosConsulta->insert($producto);     // subirlo a la ddbb
            if (!$resultado)
                $errores[]="Error al crear producto";
        }

        else{
            return $errores;
        }

        return $errores;
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

function camposRequeridos($campos):array {
    $requeridos = [];
    foreach ($campos as $campo => $valor){       // por cada valor del campo comprobar si esta vacio o no.
        if(empty($valor) && $campo!='urlfoto' && $campo!='descatalogado'){ // podria no tener foto... y descatalogado si es 0 lo considera como vacio
            $requeridos[]="ERROR: Campo requerido vacio: ".$campo;
        }
    }
    return $requeridos;
}
