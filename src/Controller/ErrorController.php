<?php

namespace App\Controller;

use App\Model\ProductoModel;

class ErrorController extends AbstractController {
    public function notFound(): string {
        $properties = ['errorMessage' => 'Page not found!'];
        //return $this->render('error.twig', $properties);
        global $cookieValue,$cookieName;
        $productosConsulta = new ProductoModel($this->db);
        $ultimoProducto = $productosConsulta->getLatestProduct();
        $rutaFotoLogo = "../imgs/logo_black.png";
        $rutaFotoUltimoProducto = "..".$ultimoProducto->getFotoProd();
        return require_once('views/error.view.php');
    }
}