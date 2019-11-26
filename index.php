<?php
declare(strict_types=1);
/**
 * TODO pasar todas las funciones a Modelo
 * TODO pasarlo todo a namespaces y Use
 * TODO renombrar todas las variables
 */
require_once('./src/clases/Entity/DB.php');
require_once('./src/clases/Entity/Producto.php');
require_once('./src/clases/Model/ProductoModel.php');
require_once('./src/clases/Entity/GuriZone.php');
require_once('./src/clases/Entity/Usuario.php');
require_once('./src/clases/Entity/Paginacion.php');
require_once('./src/clases/Model/UsuarioModel.php');
require_once ('./src/importar_productos.php');
require_once('./src/confirmar_admin.php');
require_once ('./src/conexionDB.php');

require __DIR__.'/config/bootstrap.php';

// Gestion usuario
$cookieName = "usuario";
// Si la cookie no existe la crea
if(!array_key_exists($cookieName,$_COOKIE)){
$cookieValue = "anonimo";     // establecer sesión de anonimo
    setcookie($cookieName,$cookieValue, time()+(86400*30),"/"); // Usuario conectado
}


$db = conexionDB();
//TODO convertir el db a db->getconnection()
$productos = importar_productos($db);
$guriZone = new GuriZone($productos);  // variable de informacion de la tienda online
$productosModelo = new ProductoModel($db);

// Ultimo producto subido para mostrar en una parte de la vista
$ultimoProducto = $productosModelo->getLatestProduct();

// Instanciar usuario con el valor de la cookie, si no encuentra el valor de la cookie iniciarla como anonimo
try{
    $usuario_modelo = new UsuarioModel($db);
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
            $productosConsulta = new ProductoModel($db);
            $productosTT = $productosConsulta->getTT();
            $novedades = $productosConsulta->getNovedades()
            ;
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
        if (confirmarAdmin($_COOKIE[$cookieName]) == true){
            require("views/$page.view.php");
        } else{
            $page='login';      // si no es admin -> redirigir al login
        }

        break;
    }

    case 'gestion':
    {
        // Capa de proteccion para acceder al dashboard
        if (confirmarAdmin($_COOKIE[$cookieName]) == true){
            // Eliminar un producto:
            // 1. Si se ha solicitado eliminar un producto
            if($_SERVER['REQUEST_METHOD']=='POST' && array_key_exists('id',$_POST)){
                $id = filter_input(INPUT_POST,'id',FILTER_VALIDATE_INT);
                // Eliminarlo
                $resultado = $productosModelo->delete(intval($id));
                if (!$resultado)
                    header('Location ?page=error');
                else
                    header('Location ?page=gestion');
            }

            // Gestion de paginacion:
            // 1. Si la pagina introducida es menor de 1 o no existe poner la pagina 1
            if(!array_key_exists('pg',$_GET) || $_GET['pg']<=0)
                $_GET['pg']=1;

            // Si la categoria no se ha especificado recoger todos los productos
            if (!array_key_exists('categoria',$_GET))
                $_GET['categoria']='todo';

            // Limpiar pagina solicitada
            $pagina = filter_var($_GET['pg'],FILTER_VALIDATE_INT);
            require_once('./src/productos_filtrados.php');

            // Productos solicitados por el usuario a traves de filtros
            $productos_tienda = productos_filtrados($db);
            // Datos de la paginacion y productos de la pagina actual
            $paginacion = new Paginacion(count($productos_tienda),10,$pagina,$db,"",0);

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
        if (confirmarAdmin($_COOKIE[$cookieName]) == true){
            if ($_SERVER['REQUEST_METHOD'] === 'POST'){
                require_once('./src/crear_producto.php');
            // Recoger datos validados y saneados del formulario de crear producto
                $datos = datos();
                $errores = crearProducto($datos,$db);
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
        if (confirmarAdmin($_COOKIE[$cookieName]) == true){
            // Si se accede a editar producto y ID o su valor no existe redirigir a error.view
            if (!array_key_exists('id',$_GET) || $_GET['id']>$ultimoProducto->getIdProd() || $_GET['id']<1){
                header('Location: ?page=error');
            }else
                $id = $_GET['id'];
            require_once ('./src/producto.php');
            try{
                $productoSeleccionado = productoSolicitado(intval($id),$db);
            }catch (ErrorException $errorException){
                $page="error";
            }

            $resultado = false;
            // Obtener datos del formulario
            if ($_SERVER['REQUEST_METHOD'] === 'POST'){
                require_once ('./src/editar_producto.php');
                // recoger datos validados y saneados del formulario de crear producto
                $datos = datos();
                $errores = editarProducto($datos,$db,$productoSeleccionado);
                // en la vista confirmara si se ha hecho con existo o no la actualizacion
            }

            require("views/$page.view.php");
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
        /* RESULTADOS DE LA BARRA DE BUSQUEDA */
        if($_SERVER['REQUEST_METHOD']==='GET' && array_key_exists('search',$_GET)){
            // Controlar el valor de la pagina solicitada
            if(!array_key_exists('pg',$_GET) || $_GET['pg']<=0)
                $_GET['pg']=1;
            // Si no se ha solicitado categoria buscar productos sin tener dicho campo en cuenta
            if (!array_key_exists('categoria',$_GET))
                $_GET['categoria']='todo';
            // Sanear pagina solicitada
            $pagina = filter_var($_GET['pg'],FILTER_VALIDATE_INT);

            require_once ('src/resultadosBusqueda.php');
            require_once('./src/productos_filtrados.php');
            require_once('./src/clases/Entity/Paginacion.php');

            // Sanear busqueda solicitada
            $busqueda = filter_input(INPUT_GET,'search',FILTER_SANITIZE_STRING,FILTER_SANITIZE_FULL_SPECIAL_CHARS);                   // BUSQUEDA DEL USUARIO
            $resultados = resultadosBusqueda($busqueda,$db);// PRODUCTOS OBTENIDOS POR LA BUSQUEDA
            // Recoge datos de la paginacion y sus productos segun la pagina actual
            $paginacion = new Paginacion(count($resultados),12,$pagina,$db,$busqueda,1);

        }else {
            /* MOSTRAR PRODUCTOS DE LA TIENDA */

            // Controlar el valor de la pagina solicitada
            if (!array_key_exists('pg', $_GET) || $_GET['pg'] <= 0)
                $_GET['pg'] = 1;

            // Si no se ha solicitado categoria buscar productos sin tener dicho campo en cuenta
            if (!array_key_exists('categoria', $_GET))
                $_GET['categoria'] = 'todo';

            // Sanear pagina solicitada
            $pagina = filter_var($_GET['pg'], FILTER_VALIDATE_INT);

            require_once('./src/productos_filtrados.php');
            require_once('./src/clases/Entity/Paginacion.php');

            // Productos solicitados por el usuario a traves de filtros
            $productos_tienda = productos_filtrados($db);
            $paginacion = new Paginacion(count($productos_tienda), 12, $pagina, $db, "", 1);
        }
            // Obtener el numero de productos por categoria
            $stockAccesorios = getStockCategorias($db,1);
            $stockRopa = getStockCategorias($db,2);
            $stockZapatillas = getStockCategorias($db,3);

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
        require_once ('./src/producto.php');
        $productoSeleccionado = productoSolicitado($id,$db);
        require("views/$page.view.php");
        break;
    }
    case 'perfil':
    {
        // Controlar que el usuario anonimo no puede entrar a la vista profile
        if (confirmarAdmin($_COOKIE[$cookieName]) == true || $_COOKIE[$cookieName]=='usuario')
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