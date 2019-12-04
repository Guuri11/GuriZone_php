<?php


namespace App\Controller;

use App\Model\ProductoModel;
use App\Entity\Producto;

class ProductoController extends AbstractController
{
    public function index()
    {
        global $cookieValue,$cookieName;
        $productosConsulta = new ProductoModel($this->db);
        // Usuario hace logout
        if (isset($_GET['logout'])){
            require_once ('./src/logout.php');
            logout();
        }
        // Obtener producto mas vendidos y mas nuevos
        $productosTT = $productosConsulta->getTT();
        $novedades = $productosConsulta->getNovedades();
        $ultimoProducto = $productosConsulta->getLatestProduct();
        require("views/index.view.php");
    }
}