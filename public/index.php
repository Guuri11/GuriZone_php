<?php
declare(strict_types=1);

use App\Model\UsuarioModel;
use App\DB;
use App\Core\Request;
use App\Core\Router;


require __DIR__ . '/../config/bootstrap.php';

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



// Instanciar usuario con el valor de la cookie, si no encuentra el valor de la cookie iniciarla como anonimo
try{
    $usuario_modelo = new UsuarioModel($db->getConnection());
    // Si no encuentra la cookie asignar usuario como anonimo
    $cookieValue = $_COOKIE[$cookieName] ?? 'anonimo';
    $user = $usuario_modelo->getByName($cookieValue);
}catch (PDOException $exception){
    echo $exception->getMessage();
}

$route = new Router($di);
echo $route->route($request);
