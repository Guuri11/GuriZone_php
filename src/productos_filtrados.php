<?php
declare(strict_types=1);
// LOGICA DE LA VISTA DE LA TIENDA DONDE SE MUESTRAN LOS PRODUCTOS
// NOTA: Filtro los productos por categoria y sobre esos objetos filtrare a lo que el usuario indique,
// ya que serian muchos casos posibles de filtro y creo que seria cargar muchas lineas del programa
// cuando seria tarea de hacerla en el entorno cliente pero aun no manejo tanto XD ...
/**
 * @param $db
 * @return array
 */
function productos_filtrados(DB $db):array {
    // Obtener productos por categoria o fecha o las dos.
    $modelo = new ProductoModel($db);
    $productos = $modelo->getCategoryByQuery();
    if ($_SERVER['REQUEST_METHOD']==='GET'){
        $productos = filtroFecha($productos,$db);
    }

    return $productos;
}

/**
 * @param $productos
 * @param $datos
 * @param $db
 * @return array
 */
function filtroFecha(array $productos,DB $db):array{
    // si exista unas fechas indicadas...
    if (array_key_exists('fecha_inicial',$_GET) && array_key_exists('fecha_final',$_GET)){

        // Almacenar fechas saneadas en una variable
        $fecha_inicial = filter_input(INPUT_GET,'fecha_inicial',FILTER_SANITIZE_STRING);
        $fecha_final = filter_input(INPUT_GET,'fecha_final',FILTER_SANITIZE_STRING);

        // Obtener productos segun la categoria en las fechas marcadas
        $productosConsulta = new ProductoModel($db);
        $productos = $productosConsulta->getPorDosFechas($fecha_inicial,$fecha_final,getCategoria());
    }
    return $productos;
}

/**
 * @return int
 */
function getCategoria():int{
    if(!array_key_exists('categoria',$_GET)){
        $categoria = 'todo';
    }else
        $categoria = $_GET['categoria'];

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

    return $categoria;
}

/**
 * @param $db
 * @param $categoria
 * @return mixed
 *
 * Stock de cada categoria
 */
function getStockCategorias(DB $db,int $categoria){
    $num_stock = new ProductoModel($db);
    return $num_stock->getTotalStockCategorias($categoria);
}