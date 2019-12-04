<?php

namespace App\Core;

/**
 * Class Request
 * @package App\Core
 */
class Request
{
    /**
     *
     */
    const GET = 'GET';
    /**
     *
     */
    const POST = 'POST';

    /**
     * Aquesta variable guarda el domini actual.
     * @var mixed
     */
    private $domain;

    /**
     * Ruta de la petició.
     * @var mixed
     */
    private $path;

    /**
     * Método de la petició.
     * @var mixed
     */
    private $method;

    /**
     * Paramètres enviats via GET o POST.
     * @var FilteredMap
     */
    private $params;

    /**
     * Cookies enviades.
     * @var FilteredMap
     */
    private $cookies;

    /**
     * Request constructor.
     */
    public function __construct()
    {
        $this->domain = $_SERVER['HTTP_HOST'];
        $this->path = explode('?', $_SERVER['REQUEST_URI'])[0];
        $this->method = $_SERVER['REQUEST_METHOD'];
        $this->params = new FilteredMap(array_merge($_POST, $_GET));
        $this->cookies = new FilteredMap($_COOKIE);
    }

    /**
     * @return string
     */
    public function getUrl(): string
    {
        return $this->domain . $this->path;
    }

    /**
     * @return string
     */
    public function getDomain(): string
    {
        return $this->domain;
    }

    /**
     * @return string
     */
    public function getPath(): string
    {
        return $this->path;
    }

    /**
     * @return string
     */
    public function getMethod(): string
    {
        return $this->method;
    }

    /**
     * @return bool
     */
    public function isPost(): bool
    {
        return $this->method === self::POST;
    }

    /**
     * @return bool
     */
    public function isGet(): bool
    {
        return $this->method === self::GET;
    }

    /**
     * @return FilteredMap
     */
    public function getParams(): FilteredMap
    {
        return $this->params;
    }

    /**
     * @return FilteredMap
     */
    public function getCookies(): FilteredMap
    {
        return $this->cookies;
    }
}