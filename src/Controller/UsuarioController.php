<?php


namespace App\Controller;

use App\Entity\Paginacion;
use App\Entity\Usuario;
use App\Model\CategoriasModel;
use App\Model\ProductoModel;
use App\Model\UsuarioModel;


class UsuarioController extends AbstractController
{
    public function registrarse(){
        global $cookieValue,$cookieName, $user;
        $productosConsulta = new ProductoModel($this->db);
        $usuariosConsulta = new UsuarioModel($this->db);
        $ultimoProducto = $productosConsulta->getLatestProduct();
        $errores = [];

        if ($_SERVER['REQUEST_METHOD'] === 'POST'){
            //Recogemos los datos
            $datos = $_POST;

            // Comprobar que todos los campos han sido rellenados
            foreach ($datos as $dato => $valor) {
                if (empty($valor)) {
                    $errores[] = "ERROR: Campo requerido vacio: " . $dato;
                }
            }

            //Comprobar que el email es valido
            if (!filter_var($datos['email'],FILTER_VALIDATE_EMAIL)){
                $errores[] = "ERROR: Formato de email no valido";
            }
            if (!$usuariosConsulta->getByEmail($datos['email'])){
                $errores[] = "ERROR: Este email ya esta registrado";
            }

            //Comprobar que la contraseña sea valida
            if (strlen($datos['password'])<6)
                $errores[] = "ERROR: Contraseña demasiado corta";
            if ($datos['password']!==$datos['password_repeat'])
                $errores[] = "ERROR: Las contraseñas no coinciden";

            // Insertar usuario
            if (empty($errores)){
                // 1. Instanciar usuario
                $usuario = new Usuario();
                // 2. Obtener datos saneados
                $usuario = $usuariosConsulta->getData();
                // 3. Validar usuario
                $errores = $usuariosConsulta->validate($usuario);

                // 4. Ejecutar insercion a la BBDD
                if (empty($errores)){
                    $resultado = $usuariosConsulta->insert($usuario);
                    if (!$resultado)
                        $errores[]="Error al crear usuario";
                }
            }
        }

        return $this->render('registrarse.twig',[
            'usuario'=>$cookieValue,
            'ultimo_producto'=>$ultimoProducto,
            'errores'=>$errores
        ]);
    }

    public function login(){
        global $cookieValue,$cookieName, $user;
        $productosConsulta = new ProductoModel($this->db);
        $ultimoProducto = $productosConsulta->getLatestProduct();
        $error = "";
        // Si se ha recibido datos desde el login.view
        if ($_SERVER['REQUEST_METHOD']==='POST'){
            require_once ('./src/iniciar_sesion.php');

            // Realizar login y recoger posibles errores
            $error = iniciar_sesion();
        }

        return $this->render('login.twig',[
            'usuario'=>$cookieValue,
            'ultimo_producto'=>$ultimoProducto,
            'error'=>$error
        ]);
    }

    public function logout(){
        require_once('src/cerrar_sesion.php');
        cerrar_sesion();
    }

    public function perfil(){

        global $cookieValue,$cookieName,$user;
        $productosConsulta = new ProductoModel($this->db);
        $ultimoProducto = $productosConsulta->getLatestProduct();

        // Controlar que el usuario anonimo no puede entrar a la vista profile
        if ($cookieValue === 'admin' || $cookieValue=="usuario"){
            return $this->render('perfil.twig',[
                'usuario'=>$cookieValue,
                'ultimo_producto'=>$ultimoProducto,
                'user'=>$user
            ]);
        }
        else{
            global $route;
            header("Location: ".$route->generateURL('Usuario','login')); // redirigir al perfil
        }
    }

    public function dashboard(){
        global $cookieValue,$cookieName,$user;
        $productosConsulta = new ProductoModel($this->db);
        $ultimoProducto = $productosConsulta->getLatestProduct();

        // Capa de proteccion para acceder al dashboard
        if ($_COOKIE[$cookieName] === 'admin'){
            return $this->render('dashboard.twig',[
                'usuario'=>$cookieValue,
                'ultimo_producto'=>$ultimoProducto
            ]);
        } else{
            global $route;
            header("Location: ".$route->generateURL('Producto','index')); // redirigir al inicio
        }
    }

    public function contactanos(){
        global $cookieValue,$cookieName,$user;
        $productosConsulta = new ProductoModel($this->db);
        $ultimoProducto = $productosConsulta->getLatestProduct();

        return $this->render('contactus.twig',[
            'usuario'=>$cookieValue,
            'ultimo_producto'=>$ultimoProducto,
        ]);
    }

    public function gestionProductos(){
        global $cookieValue,$cookieName,$user;
        $productosConsulta = new ProductoModel($this->db);
        $categoriaConsulta = new CategoriasModel($this->db);
        $ultimoProducto = $productosConsulta->getLatestProduct();
        $fecha_inicial = NULL;
        $fecha_final = NULL;
        $categoria = 'todo';

        // Capa de proteccion para acceder al dashboard
        if ($_COOKIE[$cookieName] === 'admin'){

            // Filtro por categoria

            // asignar valor a categoria en caso de que no se especifique
            if (!$this->request->getParams()->has('categoria') || empty($this->request->getParams()->get('categoria')))
                $this->request->getParams()->set('categoria','todo');
            $categoria = trim(filter_var($this->request->getParams()->get('categoria'),FILTER_SANITIZE_STRING));


            // Obtener todos los productos o los de la categoria especificada
            if ($categoria == 'todo')
                $productos = $productosConsulta->getAll();
            else{
                $categoria_tipo = $categoriaConsulta->getByTipoCat($categoria);
                $productos = $productosConsulta->getByCategory($categoria_tipo->getIdCat());
            }

            // Filtro por fecha
            if ($_SERVER['REQUEST_METHOD'] === 'GET' && $this->request->getParams()->has('fecha_inicial') && $this->request->getParams()->has('fecha_final')) {

                $fecha_inicial = filter_var($this->request->getParams()->get('fecha_inicial'),FILTER_SANITIZE_STRING);
                $fecha_final = filter_var($this->request->getParams()->get('fecha_final'),FILTER_SANITIZE_STRING);

                // Obtener productos segun la categoria en las fechas marcadas
                $categoria_tipo = $categoriaConsulta->getByTipoCat(ucfirst($categoria));
                $productos = $productosConsulta->getPorDosFechas($fecha_inicial, $fecha_final, $categoria_tipo->getIdCat());
            }

            // Si la pagina introducida es menor de 1 o no existe poner la pagina 1
            if(!$this->request->getParams()->has('page') || $this->request->getParams()->get('page')<=0)
                $this->request->getParams()->set('page','1');

            $pagina = filter_var($this->request->getParams()->get('page'),FILTER_VALIDATE_INT);

            $paginacion = new Paginacion(count($productos),10,$pagina,$productosConsulta,"",0);

            $parametros = [
                'usuario'=>$cookieValue,
                'ultimo_producto'=>$ultimoProducto,
                'fecha_inicial'=>$fecha_inicial,
                'fecha_final'=>$fecha_final,
                'paginacion'=>$paginacion,
                'pagina'=>$pagina,
                'categoria'=>$categoria
            ];
            return $this->render('gestion_productos.twig',$parametros);
        } else{
            global $route;
            header("Location: ".$route->generateURL('Producto','index')); // redirigir al inicio
        }
    }

    public function gestionUsuarios(){
        // TODO
        global $cookieValue,$cookieName,$user;
        $productosConsulta = new ProductoModel($this->db);
        $categoriaConsulta = new CategoriasModel($this->db);
        $ultimoProducto = $productosConsulta->getLatestProduct();

            $parametros = [
                'usuario'=>$cookieValue,
                'ultimo_producto'=>$ultimoProducto
            ];
            return $this->render('gestion_usuarios.twig',$parametros);
    }




}