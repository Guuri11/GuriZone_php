<?php


namespace App\Controller;

use App\Entity\Paginacion;
use App\Model\CategoriasModel;
use App\Model\ProductoModel;

class UsuarioController extends AbstractController
{
    public function login(){
        global $cookieValue,$cookieName, $user;
        $productosConsulta = new ProductoModel($this->db);
        $ultimoProducto = $productosConsulta->getLatestProduct();

        // Si se ha recibido datos desde el login.view
        if ($_SERVER['REQUEST_METHOD']==='POST'){
            require_once ('./src/login.php');
            // Realizar login y recoger posibles errores
            $error = login();
        }

        $rutaFotoLogo = "./imgs/logo_black.png";
        $rutaFotoUltimoProducto = ".".$ultimoProducto->getFotoProd();

        require("views/login.view.php");
    }

    public function perfil(){

        global $cookieValue,$cookieName,$user;
        $productosConsulta = new ProductoModel($this->db);
        $ultimoProducto = $productosConsulta->getLatestProduct();
        $rutaFotoLogo = "./imgs/logo_black.png";
        $rutaFotoUltimoProducto = ".".$ultimoProducto->getFotoProd();

        // Controlar que el usuario anonimo no puede entrar a la vista profile
        if ($cookieValue === 'admin' || $cookieValue=="usuario")
            require("views/perfil.view.php");
        else{
            global $route;
            header("Location: ".$route->generateURL('Usuario','login')); // redirigir al perfil

        }

    }
    public function dashboard(){
        global $cookieValue,$cookieName,$user;
        $productosConsulta = new ProductoModel($this->db);
        $ultimoProducto = $productosConsulta->getLatestProduct();
        $rutaFotoLogo = "./imgs/logo_black.png";
        $rutaFotoUltimoProducto = ".".$ultimoProducto->getFotoProd();

        // Capa de proteccion para acceder al dashboard
        if ($_COOKIE[$cookieName] === 'admin'){
            require("views/dashboard.view.php");
        } else{
            global $route;
            header("Location: ".$route->generateURL('Producto','index')); // redirigir al inicio
        }
    }

    public function contactanos(){
        global $cookieValue,$cookieName,$user;
        $productosConsulta = new ProductoModel($this->db);
        $ultimoProducto = $productosConsulta->getLatestProduct();
        $rutaFotoLogo = "./imgs/logo_black.png";
        $rutaFotoUltimoProducto = ".".$ultimoProducto->getFotoProd();

        require ("views/contactus.view.php");
    }

    public function gestion(){
        global $cookieValue,$cookieName,$user;
        $productosConsulta = new ProductoModel($this->db);
        $categoriaConsulta = new CategoriasModel($this->db);
        $ultimoProducto = $productosConsulta->getLatestProduct();
        $rutaFotoLogo = "../imgs/logo_black.png";
        $rutaFotoUltimoProducto = "..".$ultimoProducto->getFotoProd();

        // Capa de proteccion para acceder al dashboard
        if ($_COOKIE[$cookieName] === 'admin'){

            // Filtro por categoria

            // asignar valor a categoria en caso de que no se especifique
            if (!array_key_exists('categoria',$_GET) || empty($_GET['categoria']))
                $_GET['categoria']='todo';
            $categoria = trim(filter_var($_GET['categoria'],FILTER_SANITIZE_STRING));

            // Obtener todos los productos o los de la categoria especificada
            if ($categoria == 'todo')
                $productos = $productosConsulta->getAll();
            else{
                $categoria = $categoriaConsulta->getByTipoCat($categoria);
                $productos = $productosConsulta->getByCategory($categoria->getIdCat());
            }

            // Filtro por fecha
            if ($_SERVER['REQUEST_METHOD'] === 'GET' && array_key_exists('fecha_inicial', $_GET) && array_key_exists('fecha_final', $_GET)) {

                $fecha_inicial = filter_input(INPUT_GET, 'fecha_inicial', FILTER_SANITIZE_STRING);
                $fecha_final = filter_input(INPUT_GET, 'fecha_final', FILTER_SANITIZE_STRING);

                // Obtener productos segun la categoria en las fechas marcadas
                $categoria = $categoriaConsulta->getByTipoCat(ucfirst($categoria));
                $productos = $productosConsulta->getPorDosFechas($fecha_inicial, $fecha_final, $categoria->getIdCat());
            }

            // Si la pagina introducida es menor de 1 o no existe poner la pagina 1
            if(!array_key_exists('page',$_GET) || $_GET['page']<=0)
                $_GET['page']=1;

            $pagina = filter_var($_GET['page'],FILTER_VALIDATE_INT);
            $paginacion = new Paginacion(count($productos),10,$pagina,$productosConsulta,"",0);

            require("views/gestion.view.php");
        } else{
            global $route;
            header("Location: ".$route->generateURL('Producto','index')); // redirigir al inicio
        }
    }




}