<?php
declare(strict_types=1);

namespace App\Entity;

class Producto{

    private $id_prod;
    private $modelo_prod;
    private $marca_prod;
    private $categoria_prod;
    private $subcategoria_prod;
    private $color;
    private $color_disp;
    private $talla;
    private $talla_disp;
    private $stock_prod;
    private $num_ventas_prod;
    private $fecha_salida;
    private $precio_unidad;
    private $foto_prod;
    private $descripcion;
    private $cantidad;
    private $descatalogado;

    public function setAll($atributos){
        $this->modelo_prod = $atributos['modelo'];
        $this->marca_prod = $atributos['marca'];
        $this->categoria_prod = intval($atributos['categoria']);
        $this->subcategoria_prod = intval($atributos['subcategoria']);
        $this->color = $atributos['color'];
        $this->color_disp = intval($atributos['stock']);
        $this->talla = $atributos['talla'];
        $this->talla_disp = intval($atributos['stock']);
        $this->stock_prod = intval($atributos['stock']);
        $this->precio_unidad = floatval($atributos['precio']);
        $this->num_ventas_prod = intval(0);
        $this->fecha_salida = date('Y-m-d H:i:s');
        $this->foto_prod = $atributos['urlfoto'];
        $this->descripcion = $atributos['descripcion'];
        $this->descatalogado = intval($atributos['descatalogado']);
    }

    /**
     * @return int
     */
    public function getIdProd(): int
    {
        return intval($this->id_prod);
    }

    /**
     * @param int $id_prod
     */
    public function setIdProd(int $id_prod)
    {
        $this->id_prod = $id_prod;
    }

    /**
     * @return string
     */
    public function getModeloProd(): string
    {
        return $this->modelo_prod;
    }

    /**
     * @param string $modelo_prod
     */
    public function setModeloProd(string $modelo_prod)
    {
        $this->modelo_prod = $modelo_prod;
    }

    /**
     * @return string
     */
    public function getMarcaProd(): string
    {
        return $this->marca_prod;
    }

    /**
     * @param string $marca_prod
     */
    public function setMarcaProd(string $marca_prod)
    {
        $this->marca_prod = $marca_prod;
    }

    /**
     * @return string
     */
    public function getCategoriaProd(): int
    {
        return intval($this->categoria_prod);
    }

    /**
     * @param string $categoria_prod
     */
    public function setCategoriaProd(int $categoria_prod)
    {
        $this->categoria_prod = $categoria_prod;
    }

    /**
     * @return string
     */
    public function getSubcategoriaProd(): int
    {
        return intval($this->subcategoria_prod);
    }

    /**
     * @param string $subcategoria_prod
     */
    public function setSubcategoriaProd(int $subcategoria_prod)
    {
        $this->subcategoria_prod = $subcategoria_prod;
    }

    /**
     * @return string
     */
    public function getColor(): string
    {
        return $this->color;
    }

    /**
     * @param string $color
     */
    public function setColor(string $color)
    {
        $this->color = $color;
    }

    /**
     * @return int
     */
    public function getColorDisp(): int
    {
        return intval($this->color_disp);
    }

    /**
     * @param int $color_disp
     */
    public function setColorDisp(int $color_disp)
    {
        $this->color_disp = $color_disp;
    }

    /**
     * @return string
     */
    public function getTalla(): string
    {
        return $this->talla;
    }

    /**
     * @param string $talla
     */
    public function setTalla(string $talla)
    {
        $this->talla = $talla;
    }

    /**
     * @return int
     */
    public function getTallaDisp(): int
    {
        return intval($this->talla_disp);
    }

    /**
     * @param int $talla_disp
     */
    public function setTallaDisp(int $talla_disp)
    {
        $this->talla_disp = $talla_disp;
    }

    /**
     * @return int
     */
    public function getStockProd(): int
    {
        return intval($this->stock_prod);
    }

    /**
     * @param int $stock_prod
     */
    public function setStockProd(int $stock_prod)
    {
        $this->stock_prod = $stock_prod;
    }

    /**
     * @return int
     */
    public function getNumVentasProd(): int
    {
        return intval($this->num_ventas_prod);
    }

    /**
     * @param int $num_ventas_prod
     */
    public function setNumVentasProd(int $num_ventas_prod)
    {
        $this->num_ventas_prod = $num_ventas_prod;
    }

    /**
     * @return DateTime
     */
    public function getFechaSalida(): DateTime
    {
        return new DateTime($this->fecha_salida);
    }

    /**
     * @param DateTime $fecha_salida
     */
    public function setFechaSalida(DateTime $fecha_salida)
    {
        $this->fecha_salida = $fecha_salida;
    }

    /**
     * @return float
     */
    public function getPrecioUnidad(): float
    {
        return floatval($this->precio_unidad);
    }

    /**
     * @param float $precio_unidad
     */
    public function setPrecioUnidad(float $precio_unidad)
    {
        $this->precio_unidad = $precio_unidad;
    }

    /**
     * @return string
     */
    public function getFotoProd(): string
    {
        // si la foto no existe asigna la imagen por defecto
        if (empty($this->foto_prod) || !file_exists('.'.$this->foto_prod))
            $this->foto_prod = '/imgs/productos/default_product_image.png';
        return $this->foto_prod;
    }

    /**
     * @param string $foto_prod
     */
    public function setFotoProd(string $foto_prod)
    {
        $this->foto_prod = $foto_prod;
    }

    /**
     * @return string
     */
    public function getDescripcion(): string
    {
        return $this->descripcion;
    }

    /**
     * @param string $descipcion
     */
    public function setDescripcion(string $descripcion)
    {
        $this->descripcion = $descripcion;
    }
    /**
     * @return mixed
     */
    public function getCantidad()
    {
        return $this->cantidad;
    }

    /**
     * @param mixed $cantidad
     */
    public function setCantidad($cantidad)
    {
        $this->cantidad = $cantidad;
    }

    /**
     * @return mixed
     */
    public function getDescatalogado():int
    {
        return intval($this->descatalogado);
    }

    /**
     * @param mixed $descatalogado
     */
    public function setDescatalogado(int $descatalogado)
    {
        $this->descatalogado = $descatalogado;
    }

}