<?php

namespace App\Controller;

use App\Core\Request;
use App\Utils\DependencyInjector;
use Exception;

abstract class AbstractController {
    protected $request;
    protected $db;
    protected $config;
    protected $view;
    protected $log;
    protected $customerId;
    protected $di;

    public function __construct(DependencyInjector $di, Request $request)
    {
        $this->request = $request;
        $this->di = $di;

        try {
            $this->db = $di->get('PDO');
            $this->log = $di->get('Logger');
            $this->view = $di->get('Twig');
        } catch (Exception $e) {
        }
        $this->languageSelected();

        //$this->config = $di->get('Utils\Config');

    }


    protected function render(string $template, array $params): string {
        return $this->view->load($template)->render($params);
        //require_once ($template);
    }

    public function languageSelected(){
        // si no existe la sesion que contiene el idioma del usuario, la crea.
        if (!array_key_exists('lang',$_SESSION)){
            $_SESSION['lang'] = 'es_ES.UTF-8';
        }

        // si se ha recibido una peticion del idioma de la pagina, la asigna a la session
        if ($_SERVER['REQUEST_METHOD']==='GET' && array_key_exists('lang',$_GET)){
            $idioma_solicitado = filter_input(INPUT_GET,'lang',FILTER_SANITIZE_STRING,FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            switch ($idioma_solicitado){
                case 'esp':
                    $_SESSION['lang'] = 'es_ES.UTF-8';
                    break;
                case 'val':
                    $_SESSION['lang'] = 'ca_ES.UTF-8';
                    break;
                case 'ang':
                    $_SESSION['lang'] = 'en_GB.UTF-8';
                    break;
                default:
                    $_SESSION['lang'] = 'es_ES.UTF-8';
            }
        }
        // variable lang obtiene el valor de la session de idioma y la cambia por el idioma que estaba seleccionado
        $lang= filter_var($_SESSION['lang'],FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        // here we define the global system locale given the found language
        putenv("LANGUAGE=$lang");

        // this might be useful for date functions (LC_TIME) or money formatting (LC_MONETARY), for instance
        setlocale(LC_ALL, $lang);

        // this will make Gettext look for ../locales/<lang>/LC_MESSAGES/main.mo
        bindtextdomain('main', __DIR__ . '/../locales');

        // indicates in what encoding the file should be read
        bind_textdomain_codeset('main', 'UTF-8');

        // here we indicate the default domain the gettext() calls will respond to
        textdomain('main');
    }
}