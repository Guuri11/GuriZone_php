<?php
declare(strict_types=1);

use App\Entity\Producto;
use App\Entity\Paginacion;
use App\Model\UsuarioModel;
use App\DB;
use App\Core\Request;
use App\Core\Router;



require __DIR__.'/config/bootstrap.php';

$di = new \App\Utils\DependencyInjector();

// Gestion usuario
$cookieName = "usuario";
// Si la cookie no existe la crea
if(!array_key_exists($cookieName,$_COOKIE)){
$cookieValue = "anonimo";     // establecer sesión de anonimo
    setcookie($cookieName,$cookieValue, time()+(86400*30),"/"); // Usuario conectado
}


$db = new DB();
$di->set('PDO', $db->getConnection());
$request = new Request();



// Instanciar usuario con el valor de la cookie, si no encuentra el valor de la cookie iniciarla como anonimo
try{
    $usuario_modelo = new UsuarioModel($db->getConnection());
    // Si no encuentra la cookie asignar usuario como anonimo
    $cookieValue = $_COOKIE[$cookieName] ?? 'anonimo';
    $user = $usuario_modelo->getByName($cookieValue);
}catch (PDOException $exception){
    die($exception->getMessage());
}

$route = new Router($di);
$route->route($request);
//$page = $_GET['page']??"index";
//$action = $_GET['action'] ?? "indexARR";
/*
switch ($action){

    case 'index':
    {

    }
    case 'login':
    {

    }

    case 'dashboard':
    {

    case 'gestion':
    {

    }

    case 'crear_producto':
    {

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

    }

    case 'tienda':
    {
    }
    case 'producto':
    {

        break;
    }
    case 'perfil':
    {

    }
    default:
    {

    }
}*/