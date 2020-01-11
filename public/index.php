<?php
declare(strict_types=1);

use App\Model\UsuarioModel;
use App\DB;
use App\Core\Request;
use App\Core\Router;


require __DIR__ . '/../config/bootstrap.php';

$di = new \App\Utils\DependencyInjector();

// Gestion usuario
// Si la session no existe la crea
session_start();
if (!array_key_exists('rol',$_SESSION)){
    $rol_usuario = 'anonimo';
    $_SESSION['rol']=$rol_usuario;
}


$db = new DB();
$di->set('PDO', $db->getConnection());

$log = new \Monolog\Logger('eventos');
try {
    $log->pushHandler(
        new \Monolog\Handler\StreamHandler(__DIR__ . '/app.log', \Monolog\Logger::INFO)
    );
} catch (Exception $e) {
    echo "error";
}
//Injectar en el di el logger
$di->set('Logger',$log);



//Carreguem l'entorn de twig
$loader = new \Twig\Loader\FilesystemLoader(__DIR__ . '/../templates');
$twig = new \Twig\Environment($loader);

//Afegim una instancia de router a la plantilla
// la utilitzarem en les plantillas per a generar URL
$twig->addGlobal('router',new Router(new \App\Utils\DependencyInjector()));

//incloem al contenidor de serveis
$di->set('Twig',$twig);


$request = new Request();



// Instanciar usuario con el valor de la sesion, si no encuentra el valor de la sesion iniciarla como anonimo
try{
    $usuario_modelo = new UsuarioModel($db->getConnection());
    // Si no encuentra la sesion asignar usuario como anonimo
    $rol_usuario = $_SESSION['rol'] ?? 'anonimo';
    $user = $usuario_modelo->getByName($rol_usuario);
}catch (PDOException $exception){
    echo $exception->getMessage();
}

$route = new Router($di);
echo $route->route($request);
