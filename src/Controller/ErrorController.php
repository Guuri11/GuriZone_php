<?php

namespace App\Controller;

use App\Model\ProductoModel;

class ErrorController extends AbstractController {
    public function notFound(): string {
        $properties = ['errorMessage' => 'Page not found!'];
        //return $this->render('error.twig', $properties);

        global $cookieValue,$cookieName,$user;
        $productosConsulta = new ProductoModel($this->db);
        $ultimoProducto = $productosConsulta->getLatestProduct();
        $rutaFotoLogo = "imgs/logo_black.png";
        $rutaFotoUltimoProducto = "".$ultimoProducto->getFotoProd();
        return $this->render('error.twig',[
            'usuario'=>$cookieValue,
            'ultimo_producto'=>$ultimoProducto
        ]);
    }
}