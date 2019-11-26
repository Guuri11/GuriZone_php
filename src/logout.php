<?php
declare(strict_types=1);
/**
 * Cerrar sesion del usuario
 */
function logout(){
    global $user;
    global $db;
    try{
        // 1. Transformar usuario a anonimo
        $usuario_modelo = new Usuario_model($db);
        $user = $usuario_modelo->getById(1);
    }catch (PDOException $exception){
        die($exception->getMessage());
    }
    // 2. Cambiar valor de la cookie
    global $cookieName;
    global $cookieValue;
    $cookieValue = $user->getTipoRol();
    setcookie($cookieName,$cookieValue, time()+(86400*30),"/"); // Login con anonimo = Logout
    // redirigir al menu
    header('Location: ?page=index');
}