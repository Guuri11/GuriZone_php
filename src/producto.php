<?php
declare(strict_types=1);
/**
 * @param $id
 * @param $db
 * @return Producto
 *
 * Funcion simple pero es para simplificar el codigo del controlador
 */
function productoSolicitado(int $id,DB $db):Producto{
    $productosConsulta = new Product_model($db);
    $producto = $productosConsulta->getById($id);
    return $producto;
}