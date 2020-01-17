<?php
declare(strict_types=1);

use App\Model\UsuarioModel;
use App\DB;
use App\Core\Request;
use App\Core\Router;

// Twitter API Prueba
//$consumer_key = '';
//$consumer_secret='';
//$access_token='';
//$access_token_secret='';

//require_once __DIR__ . '/../src/twitterapi/twitteroauth/autoload.php';

//Conectar a la api
//$connection_tw = new \Abraham\TwitterOAuth\TwitterOAuth($consumer_key,$consumer_secret,$access_token,$access_token_secret);
//$tweet = $connection_tw->post('statuses/update',['status'=>'Hello Gurizone']);
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

$lang="en_GB";
// here we define the global system locale given the found language
putenv("LANGUAGE=$lang");

// this might be useful for date functions (LC_TIME) or money formatting (LC_MONETARY), for instance
setlocale(LC_ALL, $lang);

// this will make Gettext look for ../locales/<lang>/LC_MESSAGES/main.mo
bindtextdomain('main', __DIR__ . '/../src/locales');

// indicates in what encoding the file should be read
bind_textdomain_codeset('main', 'UTF-8');

// here we indicate the default domain the gettext() calls will respond to
textdomain('main');

// this would look for the string in forum.mo instead of main.mo
// echo dgettext('forum', 'Welcome back!');


$route = new Router($di);
echo $route->route($request);
