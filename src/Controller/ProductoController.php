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

    public function mostrarPorCategoria($params){
        $categoria = filter_var($params['categoria'],FILTER_SANITIZE_STRING);
        $pagina = filter_var($params['page'], FILTER_VALIDATE_INT);

        $productosConsulta = new ProductoModel($this->db);
        $categoriaConsulta = new CategoriasModel($this->db);
        $ultimoProducto = $productosConsulta->getLatestProduct();

        // Obtener producto mas vendidos y mas nuevos
        $productosTT = $productosConsulta->getTT();
        $novedades = $productosConsulta->getNovedades();

        $rutaFotoLogo = "./imgs/logo_black.png";
        $rutaFotoUltimoProducto = ".".$ultimoProducto->getFotoProd();

        /** FILTRO POR CATEGORIA **/
        // asignar valor a categoria en caso de que no se especifique

        // Obtener todos los productos o los de la categoria especificada
        if ($categoria == 'todo')
            $productos_tienda = $productosConsulta->getAllCatalogados();
        else{
            $categoria = $categoriaConsulta->getByTipoCat($categoria);
            $productos_tienda = $productosConsulta->getByCategory($categoria->getIdCat());
        }
        // Controlar el valor de la pagina solicitada
        $paginacion = new Paginacion(count($productos_tienda), 12, $pagina, $productosConsulta, "", 1);

        // Obtener el numero de productos por categoria
        $stockAccesorios = $productosConsulta->getTotalStockCategorias(1);
        $stockRopa = $productosConsulta->getTotalStockCategorias(2);
        $stockZapatillas = $productosConsulta->getTotalStockCategorias(3);

        require ("views/tienda.view.php");
    }

    public function mostrarPorFecha(){
        $productosConsulta = new ProductoModel($this->db);
        $ultimoProducto = $productosConsulta->getLatestProduct();

        // Obtener producto mas vendidos y mas nuevos
        $productosTT = $productosConsulta->getTT();
        $novedades = $productosConsulta->getNovedades();

        $rutaFotoLogo = "./imgs/logo_black.png";
        $rutaFotoUltimoProducto = ".".$ultimoProducto->getFotoProd();

        require ("views/tienda.view.php");
    }

    public function mostrarPorBusqueda(){
        $productosConsulta = new ProductoModel($this->db);
        $ultimoProducto = $productosConsulta->getLatestProduct();

        // Obtener producto mas vendidos y mas nuevos
        $productosTT = $productosConsulta->getTT();
        $novedades = $productosConsulta->getNovedades();

        $rutaFotoLogo = "./imgs/logo_black.png";
        $rutaFotoUltimoProducto = ".".$ultimoProducto->getFotoProd();

        require ("views/tienda.view.php");
    }

}