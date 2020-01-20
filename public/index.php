<?php
declare(strict_types=1);

use App\Model\UsuarioModel;
use App\DB;
use App\Core\Request;
use App\Core\Router;
use Abraham\TwitterOAuth\TwitterOAuth;
use Dompdf\Dompdf;

require __DIR__ . '/../config/bootstrap.php';

$di = new \App\Utils\DependencyInjector();

/* @Gestion_usuario */
require __DIR__.'/../config/config.php';
// Si la session no existe la crea con el usuario anonimo
if (!array_key_exists('rol',$_SESSION)){
    $rol_usuario = 'anonimo';
    $id_usuario = '1';
    $_SESSION['rol'] = $rol_usuario;
    $_SESSION['id'] = $id_usuario;
    $_SESSION['loggued'] = false;
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
$twig->addExtension(new Twig_Extensions_Extension_I18n());


//incloem al contenidor de serveis
$di->set('Twig',$twig);


$request = new Request();


/** @Gestion_sesion_usuario */
// Instanciar usuario con el valor de la sesion, si no encuentra el valor de la sesion iniciarla como anonimo
try{
    $usuario_modelo = new UsuarioModel($db->getConnection());
    // Si no encuentra la sesion asignar usuario como anonimo
    $rol_usuario = $_SESSION['rol'] ?? 'anonimo';
    $id_usuario = $_SESSION['id_user'] ?? '1';
    $user = $usuario_modelo->getById(intval($id_usuario));
}catch (PDOException $exception){
    echo $exception->getMessage();
}

$route = new Router($di);
echo $route->route($request);
