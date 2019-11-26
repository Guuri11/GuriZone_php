<?php
declare(strict_types=1);

/**
 * @param $id
 * @param $db
 *
 * Eliminar producto solicitado, si ha habido algun error redirige a la vista de error
 */
function eliminarProducto(int $id,DB $db){
    $modeloProducto = new Product_model($db);
    $resultado = $modeloProducto->delete(intval($id));
    if (!$resultado)
        header('Location ?page=error');
    else
        header('Location ?page=gestion');
}