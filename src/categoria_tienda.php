<?php
declare(strict_types=1);
/**
 * @param string $categoria
 * @param DB $db
 * @return array
 */
function categoria_tienda(string $categoria, DB$db):array{
    // Forzar minusculas
    strtolower($categoria);
    try{
        switch ($categoria){
            case 'todo':
                $categoria = 0;
                break;
            case 'accesorios':
                $categoria = 1;
                break;
            case 'ropa':
                $categoria = 2;
                break;
            case 'zapatillas':
                $categoria = 3;
                break;
            default:
                $categoria = 0;
        }
        // Devolver productos por su categoria o todos en caso de que sea 0
        $productosConsulta = new Product_model($db);
        if ($categoria === 0){
            return $resultado = $productosConsulta->getAllCatalogados();
        }else
            return  $resultado = $productosConsulta->getByCategory($categoria);

    }catch (PDOException $e){
        echo $e->getMessage();
        die();
    }
}