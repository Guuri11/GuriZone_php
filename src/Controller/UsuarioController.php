<?php


namespace App\Controller;

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
            header("Location: ".$route->generateURL('Producto','index')); // redirigir al perfil
        }
    }





}