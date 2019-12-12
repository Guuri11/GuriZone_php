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

        //$this->config = $di->get('Utils\Config');
    }


    protected function render(string $template, array $params): string {
        return $this->view->load($template)->render($params);
        //require_once ($template);
    }
}