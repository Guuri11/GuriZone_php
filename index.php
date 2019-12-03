<?php
declare(strict_types=1);

use App\Entity\Producto;
use App\Entity\Paginacion;
use App\Model\ProductoModel;
use App\Model\CategoriasModel;
use App\Model\UsuarioModel;
use App\DB;

require __DIR__.'/config/bootstrap.php';

// Gestion usuario
$cookieName = "usuario";
// Si la cookie no existe la crea
if(!array_key_exists($cookieName,$_COOKIE)){
$cookieValue = "anonimo";     // establecer sesión de anonimo
    setcookie($cookieName,$cookieValue, time()+(86400*30),"/"); // Usuario conectado
}


$db = new DB();
$categoriaConsulta = new CategoriasModel($db->getConnection());
$productosConsulta = new ProductoModel($db->getConnection());


// Ultimo producto subido para mostrar en una parte de la vista
$ultimoProducto = $productosConsulta->getLatestProduct();

// Instanciar usuario con el valor de la cookie, si no encuentra el valor de la cookie iniciarla como anonimo
try{
    $usuario_modelo = new UsuarioModel($db->getConnection());
    // Si no encuentra la cookie asignar usuario como anonimo
    $cookieValue = $_COOKIE[$cookieName] ?? 'anonimo';
    $user = $usuario_modelo->getByName($cookieValue);
}catch (PDOException $exception){
    die($exception->getMessage());
}



$page = $_GET['page']??"index";
switch ($page){

    case 'index':
    {
        // Usuario hace logout
        if (isset($_GET['logout'])){
            require_once ('./src/logout.php');
            logout();
        }
        // Obtener producto mas vendidos y mas nuevos
        $productosTT = $productosConsulta->getTT();
        $novedades = $productosConsulta->getNovedades();
        require("views/$page.view.php");
        break;
    }
    case 'login':
    {
        // Si se ha recibido datos desde el login.view
        if ($_SERVER['REQUEST_METHOD']==='POST'){
            require_once ('./src/login.php');
        // Realizar login y recoger posibles errores
            $error = login();
        }

        require("views/$page.view.php");
        break;
    }

    case 'dashboard':
    {
        // Capa de proteccion para acceder al dashboard
        if ($_COOKIE[$cookieName] === 'admin'){
            require("views/$page.view.php");
        } else{
            $page ='login';     // si no es admin -> redirigir al login
            require_once ("views/$page.view.php");
        }

        break;
    }

    case 'gestion':
    {
        // Capa de proteccion para acceder al dashboard
        if ($_COOKIE[$cookieName] === 'admin'){

            /** Productos solicitados por el usuario a traves de filtros **/
            // Filtro por categoria

            // asignar valor a categoria en caso de que no se especifique
            if (!array_key_exists('categoria',$_GET))
                $_GET['categoria']='todo';
            $categoria = trim(filter_var($_GET['categoria'],FILTER_SANITIZE_STRING));

            // Obtener todos los productos o los de la categoria especificada
            if ($categoria == 'todo')
                $productos = $productosConsulta->getAll();
            else{
                $categoria = $categoriaConsulta->getByTipoCat($categoria);
                $productos = $productosConsulta->getByCategory($categoria->getIdCat());
            }

            // Filtro por fecha
            if ($_SERVER['REQUEST_METHOD'] === 'GET' && array_key_exists('fecha_inicial', $_GET) && array_key_exists('fecha_final', $_GET)) {

                $fecha_inicial = filter_input(INPUT_GET, 'fecha_inicial', FILTER_SANITIZE_STRING);
                $fecha_final = filter_input(INPUT_GET, 'fecha_final', FILTER_SANITIZE_STRING);

                // Obtener productos segun la categoria en las fechas marcadas
                $categoria = $categoriaConsulta->getByTipoCat(ucfirst($categoria));
                $productos = $productosConsulta->getPorDosFechas($fecha_inicial, $fecha_final, $categoria->getIdCat());
            }

            /** Gestion de paginacion: **/
            // Si la pagina introducida es menor de 1 o no existe poner la pagina 1
            if(!array_key_exists('pg',$_GET) || $_GET['pg']<=0)
                $_GET['pg']=1;

            $pagina = filter_var($_GET['pg'],FILTER_VALIDATE_INT);
            $paginacion = new Paginacion(count($productos),10,$pagina,$productosConsulta,"",0);

            require("views/$page.view.php");
        } else{
            $page ='login';     // si no es admin -> redirigir al login
            require_once ("views/$page.view.php");
        }
        break;
    }

    case 'crear_producto':
    {
        // Capa de proteccion para acceder al dashboard
        if ($_COOKIE[$cookieName] === 'admin'){
            if ($_SERVER['REQUEST_METHOD'] === 'POST'){
                $errores=[];
                $datos = $_POST;
                // 1. Comprobar que estan todos los campos requeridos
                foreach ($datos as $dato => $valor) {
                    if (empty($valor) && $dato != 'urlfoto' && $dato != 'descatalogado') { // podria no tener foto... y descatalogado si es 0 lo considera como vacio
                        $errores[] = "ERROR: Campo requerido vacio: " . $dato;
                    }
                }
                if (empty($errores)) {
                    $producto = new Producto();
                    // indicar foto por defecto si no existe dicha imagen
                    if (empty($producto->getFotoProd()))
                         $producto->setFotoProd('/imgs/productos/default_product_image.png');
                    
                    // 2.Obtener datos saneandos
                    $producto = $productosConsulta->getData();

                    // 3.Validar datos
                    $errores = $productosConsulta->validateCrearProducto($producto);

                    // 4. Ejecutar insercion a la BBDD
                    if (empty($errores)){
                        $resultado = $productosConsulta->insert($producto);
                        if (!$resultado)
                            $errores[]="Error al crear producto";
                    }
                }
            }
            require("views/$page.view.php");
        } else{
            $page ='login';     // si no es admin -> redirigir al login
            require_once ("views/$page.view.php");
        }
        break;
    }

    case 'editar_producto':
    {
        // Capa de proteccion para acceder al dashboard
        if ($_COOKIE[$cookieName] === 'admin'){
            // Si se accede a editar producto y ID o su valor no existe redirigir a error.view
            if (!array_key_exists('id',$_GET) || $_GET['id']>$ultimoProducto->getIdProd() || $_GET['id']<1){
                header('Location: ?page=error');
            }else
                $id = $_GET['id'];
            try{
                $productoSeleccionado = $productosConsulta->getById(intval($id));
            }catch (ErrorException $errorException){
                $page="error";
            }

            $resultado = false;
            // Obtener datos del formulario
            if ($_SERVER['REQUEST_METHOD'] === 'POST'){
                $errores=[];
                $datos = $_POST;

                // 1. Comprobar que estan todos los campos requeridos
                foreach ($datos as $dato => $valor) {
                    if (empty($valor) && $dato != 'urlfoto' && $dato != 'descatalogado') { // podria no tener foto... y descatalogado si es 0 lo considera como vacio
                        $errores[] = "ERROR: Campo requerido vacio: " . $dato;
                    }
                }

                if (empty($errores)) {
                    // 1.Obtener datos saneandos
                    $producto = $productosConsulta->getData();
                    $producto->setIdProd($productoSeleccionado->getIdProd());
                    $producto->setNumVentasProd($productoSeleccionado->getNumVentasProd());

                    // 2.Validar datos
                    $errores = $productosConsulta->validate($producto);

                    // 3. Ejecutar insercion a la BBDD
                    if (empty($errores)){
                        $resultado = $productosConsulta->update($producto);     // subirlo a la ddbb
                        if ($resultado === false)
                            $errores[]="Error al modificar producto";
                    }
                }
            }

            require("views/$page.view.php");
        } else{
            $page ='login';     // si no es admin -> redirigir al login
            require_once ("views/$page.view.php");
        }
        break;
    }

    case 'borrar':
    {
        // Capa de proteccion para acceder al dashboard
        if ($_COOKIE[$cookieName] === 'admin'){
        /** Eliminar un producto: **/
        // 1. Averiguar si se ha solicitado eliminar un producto y filtrarlo
            $confirmacion = false;
        if($_SERVER['REQUEST_METHOD']=='POST' && array_key_exists('id',$_POST) && $confirmacion){
            $id = filter_input(INPUT_POST,'id',FILTER_VALIDATE_INT);

            // 2. Eliminar producto TODO: confirmacion del delete
            $resultado = $productosConsulta->delete(intval($id));
            if (!$resultado)
                header('Location ?page=error');
            else
                header('Location ?page=gestion');
        }
        require_once ("views/$page.view.php");
        } else{
            $page ='login';     // si no es admin -> redirigir al login
            require_once ("views/$page.view.php");
        }
        break;
    }

    case 'contactus':
    {
        // Literalmente solo esta de adorno xd
        require("views/$page.view.php");
        break;
    }

    case 'tienda':
    {
        /** RESULTADOS DE LA BARRA DE BUSQUEDA **/
        if($_SERVER['REQUEST_METHOD']==='GET' && array_key_exists('search',$_GET)){
            // Sanear busqueda solicitada
            $busqueda = filter_input(INPUT_GET,'search',FILTER_SANITIZE_STRING,FILTER_SANITIZE_FULL_SPECIAL_CHARS);

            // PRODUCTOS OBTENIDOS POR LA BUSQUEDA
            $resultados = $productosConsulta->getPorBuscador($busqueda);
            // Controlar el valor de la pagina solicitada
            if(!array_key_exists('pg',$_GET) || $_GET['pg']<=0)
                $_GET['pg']=1;

            if (!array_key_exists('categoria',$_GET))
                $_GET['categoria']='todo';
            $categoria = trim(filter_var($_GET['categoria'],FILTER_SANITIZE_STRING));

            // Sanear pagina solicitada
            $pagina = filter_var($_GET['pg'],FILTER_VALIDATE_INT);

            // Recoge datos de la paginacion y sus productos segun la pagina actual
            $paginacion = new Paginacion(count($resultados),12,$pagina,$productosConsulta,$busqueda,1);

        }else {

            /** Productos solicitados por el usuario a traves de filtros **/
            // Filtro por categoria:
            // asignar valor a categoria en caso de que no se especifique
            if (!array_key_exists('categoria',$_GET))
                $_GET['categoria']='todo';
            $categoria = trim(filter_var($_GET['categoria'],FILTER_SANITIZE_STRING));

            // Obtener todos los productos o los de la categoria especificada
            if ($categoria == 'todo')
                $productos_tienda = $productosConsulta->getAllCatalogados();
            else{
                $categoria = $categoriaConsulta->getByTipoCat($categoria);
                $productos_tienda = $productosConsulta->getByCategory($categoria->getIdCat());
            }

            // Filtro por fecha:
            if ($_SERVER['REQUEST_METHOD'] === 'GET' && array_key_exists('fecha_inicial', $_GET) && array_key_exists('fecha_final', $_GET)) {

                $fecha_inicial = filter_input(INPUT_GET, 'fecha_inicial', FILTER_SANITIZE_STRING);
                $fecha_final = filter_input(INPUT_GET, 'fecha_final', FILTER_SANITIZE_STRING);

                // Obtener productos segun la categoria en las fechas marcadas
                $categoria = $categoriaConsulta->getByTipoCat(ucfirst($categoria));
                $productos_tienda = $productosConsulta->getPorDosFechas($fecha_inicial, $fecha_final, $categoria->getIdCat());
            }

            /** Gestion de paginacion: **/

            // Controlar el valor de la pagina solicitada
            if (!array_key_exists('pg', $_GET) || $_GET['pg'] <= 0)
                $_GET['pg'] = 1;
            // Sanear pagina solicitada
            $pagina = filter_var($_GET['pg'], FILTER_VALIDATE_INT);
            $paginacion = new Paginacion(count($productos_tienda), 12, $pagina, $productosConsulta, "", 1);
        }
            // Obtener el numero de productos por categoria
            $stockAccesorios = $productosConsulta->getTotalStockCategorias(1);
            $stockRopa = $productosConsulta->getTotalStockCategorias(2);
            $stockZapatillas = $productosConsulta->getTotalStockCategorias(3);

            require("views/$page.view.php");

        break;

        // La vista cogera los obj's de la variable 'datos', los de 'productos_tienda' los coge como referencia para saber
        // el numero de productos que hay para hacer la paginacion. Esos datos contiene distintos valores que se aplican
        // en la vista para realizar la logica paginacion
    }
    case 'producto':
    {
        // Si se accede a editar producto y ID o su valor no existe redirigir a error.view
        if (!array_key_exists('id',$_GET) || $_GET['id']>$ultimoProducto->getIdProd() || $_GET['id']<1){
            header('Location: ?page=error');
        }else
            $id = filter_input(INPUT_GET,'id',FILTER_VALIDATE_INT);
        $productoSeleccionado = $productosConsulta->getById(intval($id));
        require("views/$page.view.php");
        break;
    }
    case 'perfil':
    {
        // Controlar que el usuario anonimo no puede entrar a la vista profile
        if ($_COOKIE[$cookieName] === 'admin' || $_COOKIE[$cookieName]==$this->className)
            require("views/$page.view.php");
        else{
            require_once ('views/login.view.php');
        }
        break;
    }
    default:
    {
        require("views/error.view.php");

    }
}