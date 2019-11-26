<?php
declare(strict_types=1);

/**
 * @param $busqueda
 * @param $db
 * @return array
 */
function resultadosBusqueda(string $busqueda,DB $db):array{
    $productosBusqueda = new ProductoModel($db);
    return $productosBusqueda->getPorBuscador($busqueda);
}