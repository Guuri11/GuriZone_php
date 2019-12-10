<?php
declare(strict_types=1);


use App\DB;
use App\Model\UsuarioModel;

/**
 * @return string
 */
function login():string{
    global $db;
    // Obtener email y contraseña saneadas
    $email = htmlspecialchars($_POST['email']);
    $password = htmlspecialchars($_POST['password']);

    // Las almacenamos dentro de un array por comodidas
    $datos = [$email,$password];

    //Confirmar login:
        // 1. Email&Contraseña rellenados?
        // 2. Existe el email en la base de datos?
        // 3. Coincide la contraseña con el email introducido?
    if (datosRequeridos($datos) && checkEmail($db->getConnection(),$email) && checkPassword($db->getConnection(),$password,$email)){   // SI LOGIN OK CAMBIAMOS
        $id = getIDLogin($db->getConnection(),$email,$password); // Obtener ID del usuario
        global $user;
        try{
            // Cambiar rol de usuario
            $usuario_modelo = new UsuarioModel($db->getConnection());
            $user = $usuario_modelo->getByRol($id);
        }catch (PDOException $exception){
            die($exception->getMessage());
        }

        // Cambiar valor de la cookie
        global $cookieName;
        $cookieValue = $user->getTipoRol();
        setcookie($cookieName,$cookieValue, time()+(86400*30),"/");
        $_COOKIE[$cookieName] = $cookieValue;
        global $route;
        header("Location: ".$route->generateURL('Usuario','perfil')); // redirigir al perfil
        return "";
    }else{
        $error = "Email o contraseña incorrecto! Vuelva a intentarlo";

        return $error;
    }
}

/**
 * @param DB $db
 * @param $email
 * @return bool
 */
function checkEmail(PDO $db, $email):bool{
    $email = filter_var($email,FILTER_SANITIZE_EMAIL);   // sanear email...
    if (filter_var($email,FILTER_VALIDATE_EMAIL)){      // si tiene un formato de email correcto...
        try{
            $checkEmail = $db->prepare('SELECT email FROM Usuario where email=:email'); // obtener email solicitado
            $checkEmail->execute(array(':email'=>$email));
            $emailResult = $checkEmail->fetch();
            if ($emailResult['email'] === $email)     // si coincide aprobar validacion, sino no...
                return true;
            else
                return false;
        }catch (PDOException $e){
            echo $e->getMessage();
        }
    }else
        return false;
}

/**
 * @param DB $db
 * @param $password
 * @param $email
 * @return bool
 */
function checkPassword(PDO $db, $password, $email):bool {
    // Conseguir la contraseña del email solicitado, y compararlo con la contrasena introducida
    try{
        $checkPasswd = $db->prepare('SELECT password FROM Usuario where email=:email AND password=:password');
        $checkPasswd->execute(array(
            ':email'=>$email,
            ':password'=>$password
        ));
        $passwdResult = $checkPasswd->fetch();
        if ($password == $passwdResult['password'])
            return true;
        else
            return false;
    }catch (PDOException $e){
        echo $e->getMessage();
    }
}

/**
 * @param DB $db
 * @param string $email
 * @param string $password
 * @return int
 */
function getIDLogin(PDO $db, string $email, string $password): int{
    try{
        //consulta del ID que solicita el usuario
        $idConsulta = $db->prepare('SELECT id_cli FROM Usuario where email=:email AND password=:password');
        $idConsulta->execute(array(
            ':email'=>$email,
            ':password'=>$password
        ));
        $idResult = $idConsulta->fetch();
        $id = intval($idResult['id_cli']);
        return $id;
    }catch (PDOException $e){
        echo $e->getMessage();
    }
}

function datosRequeridos(array $camposRequeridos):bool{
    $validar = true;
    // por cada valor del campo comprobar si esta vacio o no.
    foreach ($camposRequeridos as $campo => $valor){
        // podria no tener foto... y descatalogado si es 0 lo considera como vacio
        if(empty($valor) && $campo!='urlfoto' && $campo!='descatalogado'){
            echo "<p><strong>ERROR: Campo requerido vacio: </strong><em>$campo</em>";
            if($validar === true)       // SI HA HABIDO ERROR Y SIGUE VERDADERO CAMBIARLO A FALSO
                $validar = false;
        }
    }

    return $validar;        // devuelve el estado de la validacion
}