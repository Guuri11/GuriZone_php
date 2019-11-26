<?php
declare(strict_types=1);
/**
 * @param $db
 * @return array
 *
 * Consulta a la ddbb de todos los Productos
 */
function importar_productos(DB $db): array{
    $productosConsulta = new Product_model($db);
    $resultado = $productosConsulta->getAllCatalogados();
    return $resultado;
}