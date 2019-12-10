<?php


namespace App\Controller;

use App\Entity\Paginacion;
use App\Model\CategoriasModel;
use App\Model\ProductoModel;
use App\Entity\Producto;

class ProductoController extends AbstractController
{
    public function index()
    {
        global $cookieValue,$cookieName;


        $productosConsulta = new ProductoModel($this->db);
        $ultimoProducto = $productosConsulta->getLatestProduct();

        // Obtener producto mas vendidos y mas nuevos
        $productosTT = $productosConsulta->getTT();
        $novedades = $productosConsulta->getNovedades();

        $rutaFotoLogo = "./imgs/logo_black.png";
        $rutaFotoUltimoProducto = ".".$ultimoProducto->getFotoProd();
        // Usuario hace logout
        if (isset($_GET['logout'])){
            require_once ('./src/logout.php');
            logout();
        }
        require("views/index.view.php");
    }

    public function mostrarProducto($id){
        global $cookieValue,$cookieName;
        $productosConsulta = new ProductoModel($this->db);
        $ultimoProducto = $productosConsulta->getLatestProduct();
        // Si se accede a editar producto y ID o su valor no existe redirigir a error.view
        if ($id>$ultimoProducto->getIdProd() || $id<1){
            header('Location: /GuriZone/');
        }else
            $id = filter_var($id,FILTER_VALIDATE_INT);
        $productoSeleccionado = $productosConsulta->getById(intval($id));

        $rutaFotoLogo = "../imgs/logo_black.png";
        $rutaFotoUltimoProducto = "..".$ultimoProducto->getFotoProd();
        require("views/producto.view.php");
    }

    public function mostrarPorCategoria($datos){
        $categoria = $datos['categoria'];
        $pagina = $datos['page'];

    }

}