<?php
declare(strict_types=1);

use App\Model\UsuarioModel;
/**
 * Cerrar sesion del usuario
 */
function logout(){
    global $user;
    global $db;
    try{
        // 1. Transformar usuario a anonimo
        $usuario_modelo = new UsuarioModel($db->getConnection());
        $user = $usuario_modelo->getById(1);
    }catch (PDOException $exception){
        echo $exception->getMessage();
    }
    // 2. Cambiar valor de la cookie
    global $cookieName;
    global $cookieValue;
    $cookieValue = $user->getTipoRol();
    setcookie($cookieName,$cookieValue, time()+(86400*30),"/"); // Login con anonimo = Logout
    // redirigir al menu
    global $route;
    header("Location: ".$route->generateURL('Producto','index')); // redirigir al perfil

}