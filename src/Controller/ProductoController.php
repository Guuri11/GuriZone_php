<?php


namespace App\Controller;

use Abraham\TwitterOAuth\TwitterOAuthException;
use App\Entity\Paginacion_productos;
use App\Model\CategoriasModel;
use App\Model\ProductoModel;
use App\Entity\Producto;
use Dompdf\Dompdf;
use Dompdf\Options;
use ErrorException;
use http\Exception;

class ProductoController extends AbstractController
{
    public function index()
    {
        global $rol_usuario;
        $productosConsulta = new ProductoModel($this->db);
        $ultimoProducto = $productosConsulta->getLatestProduct();

        // Obtener producto mas vendidos y mas nuevos
        $productosTT = $productosConsulta->getTT();
        $novedades = $productosConsulta->getNovedades();

        return $this->render('index.twig',[
            'usuario'=>$rol_usuario,
            'ultimo_producto'=>$ultimoProducto,
            'productosTT'=>$productosTT,
            'novedades'=>$novedades
        ]);
    }

    public function mostrarProducto($id){
        global $rol_usuario,$user;
        $productosConsulta = new ProductoModel($this->db);
        $ultimoProducto = $productosConsulta->getLatestProduct();

        // variable que indica si el empleado ha creado el producto seleccionado, para mostrar o no el boton de editarlo
        $producto_de_empleado = false;

        // Si se accede a editar producto y ID o su valor no existe redirigir a error.view
        if ($id>$ultimoProducto->getIdProd() || $id<1){
            header('Location: http://gurizone.local/');
        }else
            $id = filter_var($id,FILTER_VALIDATE_INT);
        $productoSeleccionado = $productosConsulta->getById(intval($id));
        if ($productoSeleccionado->getIdEmpleado()===$user->getIdCli())
            $producto_de_empleado = true;

        // Control de si el usuario solicita ver el producto en PDF
        if ($_SERVER['REQUEST_METHOD']==='GET' && array_key_exists('pdf',$_GET)){
            // obtiene el id del producto para usarlo de referencia
            $valor_pdf = filter_input(INPUT_GET,'pdf',FILTER_SANITIZE_FULL_SPECIAL_CHARS,FILTER_SANITIZE_STRING);
            $valor_pdf = intval($valor_pdf);
            // si se solicita generar un pdf diferente al del producto al que estaba situado no lo genera
            if ($valor_pdf === $productoSeleccionado->getIdProd()){
                $options = new Options();
                $options->setIsRemoteEnabled(true);
                $options->setIsHtml5ParserEnabled(true);
                $pdf = new Dompdf($options);

                $pdf->loadHtml($this->render('producto_pdf.twig',['producto'=>$productoSeleccionado]));
                $pdf->setPaper('A4',"landscape");
                $pdf->render();

                $nombre_pdf = strtolower($productoSeleccionado->getModeloProd()).'_gurizone.pdf';
                $nombre_pdf = str_replace(' ','_',$nombre_pdf);
                return $pdf->stream($nombre_pdf);
            }
        }

        return $this->render('producto.twig',[
            'usuario'=>$rol_usuario,
            'ultimo_producto'=>$ultimoProducto,
            'producto'=>$productoSeleccionado,
            'producto_de_empleado'=>$producto_de_empleado
        ]);

    }

    public function catalogo(){
        global $rol_usuario;
        $productosConsulta = new ProductoModel($this->db);
        $categoriaConsulta = new CategoriasModel($this->db);
        $ultimoProducto = $productosConsulta->getLatestProduct();
        $fecha_inicial = NULL;
        $fecha_final = NULL;
        $busqueda = NULL;
        $categoria = "todo";

        /** CATALOGO */

        // FILTRO POR BUSQUEDA
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
            $paginacion = new Paginacion_productos(count($resultados),12,$pagina,$productosConsulta,$busqueda,1);

        }else {

            // FILTRO POR CATEGORIA
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

            // FILTRO POR FECHA
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

            $paginacion = new Paginacion_productos(count($productos_tienda), 12, $pagina, $productosConsulta, "", 1);
        }
        // Obtener el numero de productos por categoria
        $stockAccesorios = $productosConsulta->getTotalStockCategorias(1);
        $stockRopa = $productosConsulta->getTotalStockCategorias(2);
        $stockZapatillas = $productosConsulta->getTotalStockCategorias(3);

        $parametros = [
            'usuario'=>$rol_usuario,
            'ultimo_producto'=>$ultimoProducto,
            'fecha_inicial'=>$fecha_inicial,
            'fecha_final'=>$fecha_final,
            'busqueda'=>$busqueda,
            'categoria'=>$categoria,
            'paginacion'=>$paginacion,
            'pagina'=>$pagina,
            'stock_accesorios'=>$stockAccesorios['stock'],
            'stock_ropa'=>$stockRopa['stock'],
            'stock_zapatillas'=>$stockZapatillas['stock']
        ];

        return $this->render('catalogo.twig',$parametros);
    }

    public function crearProducto(){

        global $rol_usuario,$user;
        $productosConsulta = new ProductoModel($this->db);
        $ultimoProducto = $productosConsulta->getLatestProduct();

        $datos_enviados = false;
        $errores = "";
        $warning = "";

        // Capa de proteccion para acceder al formulario para crear un producto
        if ( $rol_usuario === 'admin' || $rol_usuario === 'empleado'){
            if ($_SERVER['REQUEST_METHOD'] === 'POST'){
                $datos_enviados = true;
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

                    // 2.Obtener datos saneandos
                    $producto = $productosConsulta->getData();
                    // indicar foto por defecto si no existe dicha imagen
                    if (empty($producto->getFotoProd()))
                        $producto->setFotoProd('../imgs/productos/default_product_image.png');

                    // 3.Validar datos
                    $errores = $productosConsulta->validateCrearProducto($producto);

                    // 4. Ejecutar insercion a la BBDD
                    if (empty($errores)){
                        $resultado = $productosConsulta->insert($producto);
                        if (!$resultado)
                            $errores[]="Error al crear producto";
                        else{
                            // Conectar app con la cuenta de tw y publicar el producto subido
                            global $consumer_key,$consumer_secret,$access_token,$access_token_secret;

                            // Instanciar objeto Twitter
                            try {
                                $connection_tw = new \Abraham\TwitterOAuth\TwitterOAuth($consumer_key,$consumer_secret,$access_token,$access_token_secret);
                                // Preparar para twittear foto del producto
                                $tweet_foto = $connection_tw->upload('media/upload',['media'=>'.'.$producto->getFotoProd()]);
                                // Texto del tweet
                                $texto_tweet = 'Ojo! Nuevo producto en venta, os traemos el siguiente producto: ';
                                $texto_tweet .= $producto->getModeloProd().'. Entra a nuestra web y échales un vistazo: ';
                                $texto_tweet .= 'http://gurizone.local';

                                $parametros_tweet = [
                                    'status'=>$texto_tweet,
                                    'media_ids'=>[$tweet_foto->media_id_string]
                                ];
                                // Subir Tweet
                                $tweet = $connection_tw->post('statuses/update',$parametros_tweet);
                            }catch (TwitterOAuthException $exception){
                                $warning = 'Fallo con la API de Twitter...';
                            }
                        }
                    }
                }
            }
            return $this->render('crear_producto.twig',[
               'usuario'=>$rol_usuario,
               'ultimo_producto'=>$ultimoProducto,
               'datos_enviados'=>$datos_enviados,
                'errores'=>$errores,
                'warning'=>$warning
            ]);
        } else{
            global $request;
            $errorController = new ErrorController($this->di, $request);
            return $errorController->notFound();
        }
    }

    public function editarProducto($id){
        global $rol_usuario,  $user;
        $productosConsulta = new ProductoModel($this->db);
        $ultimoProducto = $productosConsulta->getLatestProduct();
        $errores = "";
        $datos_enviados = false;

        // Capa de proteccion para acceder a un producto para editarlo
        if ( $rol_usuario === 'admin' || $rol_usuario === 'empleado') {
            // Si se accede a editar producto y ID o su valor no existe redirigir a error.view
            if ($id > $ultimoProducto->getIdProd() || $id < 1) {
                global $route;
                header('Location: ' . $route->generateURL('Producto', 'index'));
            }
            try {
                // Si el empleado es quien solicita editar un producto
                if ($rol_usuario === 'empleado'){
                    // Obtiene el producto comprobando de que sea el creador de dicho producto, en caso de que no
                    // se lanzara un error en el producto solicitado, por no tener permiso de editar dicho producto
                    $productoSeleccionado = $productosConsulta->getById(intval($id),0,$user->getIdCli());
                    if (!$productoSeleccionado){
                        global $request;
                        $errorController = new ErrorController($this->di, $request);
                        return $errorController->notFound();
                    }
                }else
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
                $datos_enviados = true;

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
            return $this->render('editar_producto.twig',[
                'usuario'=>$rol_usuario,
                'ultimo_producto'=>$ultimoProducto,
                'producto'=>$productoSeleccionado,
                'errores'=>$errores,
                'datos_enviados'=>$datos_enviados
            ]);
        } else {
            global $route;
            header("Location: " . $route->generateURL('Producto', 'index')); // redirigir al inicio
        }
        return "";
    }

    public function borrarProducto($id){

        global $rol_usuario, $cookieName,$user;
        $productosConsulta = new ProductoModel($this->db);
        $ultimoProducto = $productosConsulta->getLatestProduct();

        // Capa de proteccion para acceder a borrar un producto
        if ( $rol_usuario === 'admin' || $rol_usuario === 'empleado'){
            // 1. Averiguar si se ha solicitado eliminar un producto y filtrarlo
            if($_SERVER['REQUEST_METHOD']=='POST' && $this->request->getParams()->has('borrar')){
                $borrar = filter_input(INPUT_POST,'borrar',FILTER_SANITIZE_STRING);
                $borrar = filter_var($this->request->getParams()->get('borrar'),FILTER_SANITIZE_STRING);
                if ($borrar === 'true'){
                    $id = filter_var($id, FILTER_SANITIZE_NUMBER_INT);
                    // 2. Eliminar producto
                    // si el empleado solicita borrar un producto hace la consulta a la base de datos
                    // en caso de no haber creado el producto la funcion devolvera False y recibira un error
                    // en la solicitud del recurso
                    if ($rol_usuario === 'empleado'){
                        $resultado = $productosConsulta->delete(intval($id),$user->getIdCli());
                        if (!$resultado){
                            global $request;
                            $errorController = new ErrorController($this->di, $request);
                            return $errorController->notFound();
                        }
                    }else
                        $resultado = $productosConsulta->delete(intval($id));
                    global $route;
                    if (!$resultado){
                        global $request;
                        $errorController = new ErrorController($this->di, $request);
                        return $errorController->notFound();
                    } else{
                        header('Location: '.$route->generateURL('Usuario','gestion'));

                    }
                }
            }
            return $this->render('borrar_producto.twig',[
                'usuario'=>$rol_usuario,
                'ultimo_producto'=>$ultimoProducto,
                'id'=>$id
            ]);
        } else{
            global $route;
            header("Location: " . $route->generateURL('Producto', 'index')); // redirigir al inicio
        }
        return "";
    }
}