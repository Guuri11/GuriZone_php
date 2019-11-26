<?php
declare(strict_types=1);


class GuriZone{

    /********************************************* ATRIBUTOS *********************************************/

    private $productos = [];
    private $guriZone = "GuriZone";

    /********************************************* CONSTRUCTOR *********************************************/

    public function __construct($productos){
        $this->productos = $productos;
    }

    /********************************************* METODOS ********************************************
     * @param $id
     * @return Producto
     */
    public function getProducto($id): Producto{
        return $this->productos[$id];
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
     * @return string
     */
    public function getGuriZone(): string
    {
        return $this->guriZone;
    }

    /**
     * @param string $guriZone
     */
    public function setGuriZone(string $guriZone)
    {
        $this->guriZone = $guriZone;
    }

}
