<?php
declare(strict_types=1);

/**
 * Class Paginacion
 */
class Paginacion
{
    /********************************************* ATRIBUTOS *********************************************/
    private $num_productos;
    private $productos_pagina;
    private $num_paginas;
    private $pagina;
    private $producto_inicial;
    private $producto_final;
    private $productos;
    private $categoria;
    private $fechas;
    private $busqueda;
    /********************************************* CONSTRUCTOR *********************************************/
    public function __construct(int $num_productos, int $productos_pagina,int $pagina,DB $db,string $busqueda="", int $descatalogados=0)
    {
        $this->num_productos = $num_productos;
        $this->productos_pagina = $productos_pagina;
        $this->num_paginas = ceil($this->num_productos/$this->productos_pagina);
        $this->pagina = $pagina;
        $this->producto_inicial = intval(($this->pagina-1)*$this->productos_pagina);
        $this->producto_final= intval($this->producto_inicial+$this->productos_pagina);
        $this->categoria = $this->categoriaSolicitada();
        $this->fechas = $this->fechasSolicitadas();
        $this->busqueda = $busqueda;
        $productosConsulta = new ProductoModel($db);
        $this->productos = $productosConsulta->getProdsTienda($this->producto_inicial,$this->productos_pagina,$busqueda,$this->categoria,$this->fechas,$descatalogados);

    }

    /********************************************* METODOS *********************************************/

    /**
     * @return int
     */
    public function categoriaSolicitada():int{
        if(!array_key_exists('categoria',$_GET)){
            $categoria = 'todo';
        }else
            $categoria = $_GET['categoria'];
        strtolower($categoria);
        switch ($categoria){
            case 'todo':
                $categoria = 0;
                break;
            case 'accesorios':
                $categoria = 1;
                break;
            case 'ropa':
                $categoria = 2;
                break;
            case 'zapatillas':
                $categoria = 3;
                break;
            default:
                $categoria = 0;
        }
        return $categoria;
    }

    /**
     * @return array
     */
    public function fechasSolicitadas():array{
        $fechas = [];
        if (array_key_exists('fecha_inicial',$_GET)&& array_key_exists('fecha_final',$_GET)){
            $fechas['fecha_inicial'] = $_GET['fecha_inicial'];
            $fechas['fecha_final'] = $_GET['fecha_final'];
        }

        return $fechas;
    }

    /**
     * @return int
     */
    public function getNumProductos(): int
    {
        return $this->num_productos;
    }

    /**
     * @param int $num_productos
     */
    public function setNumProductos(int $num_productos)
    {
        $this->num_productos = $num_productos;
    }

    /**
     * @return int
     */
    public function getProductosPagina(): int
    {
        return $this->productos_pagina;
    }

    /**
     * @param int $productos_pagina
     */
    public function setProductosPagina(int $productos_pagina)
    {
        $this->productos_pagina = $productos_pagina;
    }

    /**
     * @return float
     */
    public function getNumPaginas(): float
    {
        return $this->num_paginas;
    }

    /**
     * @param float $num_paginas
     */
    public function setNumPaginas(float $num_paginas)
    {
        $this->num_paginas = $num_paginas;
    }

    /**
     * @return int
     */
    public function getPagina(): int
    {
        return $this->pagina;
    }

    /**
     * @param int $pagina
     */
    public function setPagina(int $pagina)
    {
        $this->pagina = $pagina;
    }

    /**
     * @return float|int
     */
    public function getProductoInicial()
    {
        return $this->producto_inicial;
    }

    /**
     * @param float|int $producto_inicial
     */
    public function setProductoInicial($producto_inicial)
    {
        $this->producto_inicial = $producto_inicial;
    }

    /**
     * @return float|int
     */
    public function getProductoFinal()
    {
        return $this->producto_final;
    }

    /**
     * @param float|int $producto_final
     */
    public function setProductoFinal($producto_final)
    {
        $this->producto_final = $producto_final;
    }

    /**
     * @return array
     */
    public function getProductos(): array
    {
        return $this->productos;
    }

    /**
     * @param array $productos
     */
    public function setProductos(array $productos)
    {
        $this->productos = $productos;
    }

    /**
     * @return int
     */
    public function getCategoria(): int
    {
        return $this->categoria;
    }

    /**
     * @param int $categoria
     */
    public function setCategoria(int $categoria)
    {
        $this->categoria = $categoria;
    }

    /**
     * @return array
     */
    public function getFechas(): array
    {
        return $this->fechas;
    }

    public function getFecha($fecha):string {
        return $this->fechas[$fecha];
    }

    /**
     * @param array $fechas
     */
    public function setFechas(array $fechas)
    {
        $this->fechas = $fechas;
    }

    /**
     * @return string
     */
    public function getBusqueda(): string
    {
        return $this->busqueda;
    }

    /**
     * @param string $busqueda
     */
    public function setBusqueda(string $busqueda)
    {
        $this->busqueda = $busqueda;
    }



}