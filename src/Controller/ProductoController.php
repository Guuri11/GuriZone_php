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
        require("views/producto.view.php");
    }

    public function mostrarPorCategoria($categoria,$page){
        var_dump($categoria);
        var_dump($page);
        echo "ejejeje";
        global $cookieValue,$cookieName;
        $productosConsulta = new ProductoModel($this->db);
        $ultimoProducto = $productosConsulta->getLatestProduct();
        $categoriaConsulta = new CategoriasModel($this->db);

        // Filtro por categoria:
        // asignar valor a categoria en caso de que no se especifique
        $categoria = trim(filter_var($categoria,FILTER_SANITIZE_STRING));

        // Obtener todos los productos o los de la categoria especificada
        if ($categoria == 'todo')
            $productos_tienda = $productosConsulta->getAllCatalogados();
        else {
            $categoria = $categoriaConsulta->getByTipoCat($categoria);
            $productos_tienda = $productosConsulta->getByCategory($categoria->getIdCat());
        }
        // Controlar el valor de la pagina solicitada
        if (!array_key_exists('pg', $_GET) || $_GET['pg'] <= 0)
            $_GET['pg'] = 1;
        // Sanear pagina solicitada
        $pagina = filter_var($page, FILTER_VALIDATE_INT);
        $paginacion = new Paginacion(count($productos_tienda), 12, $pagina, $productosConsulta, "", 1);

        // Obtener el numero de productos por categoria
        $stockAccesorios = $productosConsulta->getTotalStockCategorias(1);
        $stockRopa = $productosConsulta->getTotalStockCategorias(2);
        $stockZapatillas = $productosConsulta->getTotalStockCategorias(3);

        require("views/tienda.view.php");
    }

}