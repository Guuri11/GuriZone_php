<?php


namespace App\Controller;

use App\Entity\Paginacion;
use App\Model\CategoriasModel;
use App\Model\ProductoModel;
use App\Entity\Producto;
use ErrorException;
use http\Exception;

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

        // Usuario hace logout
        if ($this->request->getParams()->has('logout')){
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

        return $this->render('producto.twig',[
            'usuario'=>$cookieValue,
            'ultimo_producto'=>$ultimoProducto,
            'producto'=>$productoSeleccionado
        ]);

    }

    public function catalogo(){
        global $cookieValue,$cookieName;
        $productosConsulta = new ProductoModel($this->db);
        $categoriaConsulta = new CategoriasModel($this->db);
        $ultimoProducto = $productosConsulta->getLatestProduct();


        /** CATALOGO */

        if($this->request->getParams()->has('search')){
            // Sanear busqueda solicitada
            $busqueda = filter_var($this->request->getParams()->get('search'),FILTER_SANITIZE_STRING, FILTER_SANITIZE_FULL_SPECIAL_CHARS);

            // PRODUCTOS OBTENIDOS POR LA BUSQUEDA
            $resultados = $productosConsulta->getPorBuscador($busqueda);
            // Controlar el valor de la pagina solicitada
            if(!$this->request->getParams()->has('page') || $this->request->getParams()->get('page')<=0)
                $this->request->getParams()->set('page','1');

            // Sanear pagina solicitada
            $pagina = filter_var($this->request->getParams()->get('page'),FILTER_VALIDATE_INT);

            // Recoge datos de la paginacion y sus productos segun la pagina actual
            $paginacion = new Paginacion(count($resultados),12,$pagina,$productosConsulta,$busqueda,1);

        }else {

            // Filtro por categoria:
            // asignar valor a categoria en caso de que no se especifique
            if (!$this->request->getParams()->has('categoria') || empty($this->request->getParams()->get('categoria')))
                $this->request->getParams()->set('categoria','todo');
            $categoria = trim(filter_var($this->request->getParams()->get('categoria'),FILTER_SANITIZE_STRING));

            // Obtener todos los productos o los de la categoria especificada
            if ($categoria == 'todo')
                $productos_tienda = $productosConsulta->getAllCatalogados();
            else{
                $categoria_tipo = $categoriaConsulta->getByTipoCat($categoria);
                $productos_tienda = $productosConsulta->getByCategory($categoria_tipo->getIdCat());
            }

            // Filtro por fecha:
            if ($_SERVER['REQUEST_METHOD'] === 'GET' && $this->request->getParams()->has('fecha_inicial') && $this->request->getParams()->has('fecha_final')) {

                $fecha_inicial = filter_var($this->request->getParams()->get('fecha_inicial'),FILTER_SANITIZE_STRING);
                $fecha_final = filter_var($this->request->getParams()->get('fecha_final'),FILTER_SANITIZE_STRING);

                // Obtener productos segun la categoria en las fechas marcadas
                $categoria_tipo = $categoriaConsulta->getByTipoCat(ucfirst($categoria));
                $productos_tienda = $productosConsulta->getPorDosFechas($fecha_inicial, $fecha_final, $categoria_tipo->getIdCat());
            }


            // Controlar el valor de la pagina solicitada
            if(!$this->request->getParams()->has('page') || $this->request->getParams()->get('page')<=0)
                $this->request->getParams()->set('page','1');
            // Sanear pagina solicitada
            $pagina = filter_var($this->request->getParams()->get('page'),FILTER_VALIDATE_INT);

            $paginacion = new Paginacion(count($productos_tienda), 12, $pagina, $productosConsulta, "", 1);
        }
        // Obtener el numero de productos por categoria
        $stockAccesorios = $productosConsulta->getTotalStockCategorias(1);
        $stockRopa = $productosConsulta->getTotalStockCategorias(2);
        $stockZapatillas = $productosConsulta->getTotalStockCategorias(3);


        require("views/catalogo_tienda.view.php");
    }

    public function crearProducto(){

        global $cookieValue,$cookieName,$user;
        $productosConsulta = new ProductoModel($this->db);
        $ultimoProducto = $productosConsulta->getLatestProduct();

        // Capa de proteccion para acceder al dashboard
        if ($_COOKIE[$cookieName] === 'admin'){
            if ($_SERVER['REQUEST_METHOD'] === 'POST'){
                $errores=[];
                $datos = $_POST;
                // 1. Comprobar que estan todos los campos requeridos
                foreach ($datos as $dato => $valor) {
                    if (empty($valor) && $dato != 'urlfoto' && $dato != 'descatalogado') { // podria no tener foto... y descatalogado si es 0 lo considera como vacio
                        $errores[] = "ERROR: Campo requerido vacio: " . $dato;
                    }
                }
                if (empty($errores)) {
                    $producto = new Producto();
                    // indicar foto por defecto si no existe dicha imagen
                    if (empty($producto->getFotoProd()))
                        $producto->setFotoProd('/imgs/productos/default_product_image.png');

                    // 2.Obtener datos saneandos
                    $producto = $productosConsulta->getData();

                    // 3.Validar datos
                    $errores = $productosConsulta->validateCrearProducto($producto);

                    // 4. Ejecutar insercion a la BBDD
                    if (empty($errores)){
                        $resultado = $productosConsulta->insert($producto);
                        if (!$resultado)
                            $errores[]="Error al crear producto";
                    }
                }
            }
            require("views/crear_producto.view.php");
        } else{
            global $route;
            header("Location: ".$route->generateURL('Producto','index')); // redirigir al inicio
        }
    }

    public function editarProducto($id)
    {

        global $cookieValue, $cookieName, $user;
        $productosConsulta = new ProductoModel($this->db);
        $ultimoProducto = $productosConsulta->getLatestProduct();

        // Capa de proteccion para acceder al dashboard
        if ($_COOKIE[$cookieName] === 'admin') {
            // Si se accede a editar producto y ID o su valor no existe redirigir a error.view
            if ($id > $ultimoProducto->getIdProd() || $id < 1) {
                global $route;
                header('Location: ' . $route->generateURL('Producto', 'index'));
            }
            try {
                $productoSeleccionado = $productosConsulta->getById(intval($id));
            } catch (Exception $exception) {
                global $request;
                $errorController = new ErrorController($this->di, $request);
                return $errorController->notFound();
            }

            $resultado = false;
            // Obtener datos del formulario
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $errores = [];
                $datos = $_POST;

                // 1. Comprobar que estan todos los campos requeridos
                foreach ($datos as $dato => $valor) {
                    if (empty($valor) && $dato != 'urlfoto' && $dato != 'descatalogado') { // podria no tener foto... y descatalogado si es 0 lo considera como vacio
                        $errores[] = "ERROR: Campo requerido vacio: " . $dato;
                    }
                }

                if (empty($errores)) {
                    // 1.Obtener datos saneandos
                    $producto = $productosConsulta->getData();
                    $producto->setIdProd($productoSeleccionado->getIdProd());
                    $producto->setNumVentasProd($productoSeleccionado->getNumVentasProd());

                    // 2.Validar datos
                    $errores = $productosConsulta->validate($producto);

                    // 3. Ejecutar insercion a la BBDD
                    if (empty($errores)) {
                        $resultado = $productosConsulta->update($producto);     // subirlo a la ddbb
                        if ($resultado === false)
                            $errores[] = "Error al modificar producto";
                    }
                }
            }
            require("views/editar_producto.view.php");
        } else {
            global $route;
            header("Location: " . $route->generateURL('Producto', 'index')); // redirigir al inicio
        }
        return "";
    }

    public function borrarProducto($id){

        global $cookieValue, $cookieName;
        $productosConsulta = new ProductoModel($this->db);
        $ultimoProducto = $productosConsulta->getLatestProduct();

        // Capa de proteccion para acceder al dashboard
        if ($cookieValue === 'admin'){
            // 1. Averiguar si se ha solicitado eliminar un producto y filtrarlo
            if($_SERVER['REQUEST_METHOD']=='POST' && $this->request->getParams()->has('borrar')){
                $borrar = filter_input(INPUT_POST,'borrar',FILTER_SANITIZE_STRING);
                $borrar = filter_var($this->request->getParams()->get('borrar'),FILTER_SANITIZE_STRING);
                if ($borrar === 'true'){
                    $id = filter_var($id, FILTER_SANITIZE_NUMBER_INT);
                    // 2. Eliminar producto
                    $resultado = $productosConsulta->delete(intval($id));
                    global $route;
                    if (!$resultado){
                        var_dump($resultado);
                        global $request;
                        $errorController = new ErrorController($this->di, $request);
                        return $errorController->notFound();
                    } else{
                        var_dump($resultado);
                        header('Location: '.$route->generateURL('Usuario','gestion'));

                    }
                }
            }
            require_once ("views/borrar.view.php");
        } else{
            global $route;
            header("Location: " . $route->generateURL('Producto', 'index')); // redirigir al inicio
        }
        return "";
    }
}