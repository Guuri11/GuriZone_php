<?php
declare(strict_types=1);
/**
 * @param $datos
 * @param $db
 * @return bool
 */
function crearProducto(array $datos,DB $db):array {
    $errores = [];
    $datos = $_POST;

    // 1. Comprobar que estan todos los campos requeridos
    foreach ($datos as $dato => $valor){
        if(empty($valor) && $dato!='urlfoto' && $dato!='descatalogado'){ // podria no tener foto... y descatalogado si es 0 lo considera como vacio
            $errores[]="ERROR: Campo requerido vacio: ".$dato;
        }
    }
    // Si todos los campos requeridos estan rellenados:
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
        }else{
            return $errores;
        }

        return $errores;
    }
    return $errores;
}
