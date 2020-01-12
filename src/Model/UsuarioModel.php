<?php
declare(strict_types=1);

namespace App\Model;

use App\Entity\Producto;
use PDO;
use App\Entity\Usuario;
use PDOException;


/**
 * Class Product_model
 */
class UsuarioModel{
    private $db;
    protected $className = 'App\Entity\Usuario';

    /**
     * @param $db
     */
    function __construct(PDO $db){
        $this->db = $db;
    }
    public function getById(int $id):Usuario{
        try {
            $stmt = $this->db->prepare('SELECT * FROM Usuario WHERE id_cli=:id');
            $stmt->bindParam(':id',$id,PDO::PARAM_INT);
            $stmt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, $this->className);
            $stmt->execute();
            return $stmt->fetch();
        }catch (\PDOException $exception){
            echo $exception->getMessage();
        }
    }
    public function getByName(string $name):Usuario {
        try {
            $stmt = $this->db->prepare('SELECT * FROM Usuario WHERE nombre = :nombre');
            $stmt->bindParam(':nombre',$name,PDO::PARAM_STR);
            $stmt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, $this->className);
            $stmt->execute();
            return $stmt->fetch();
        }catch (\PDOException $exception){
            echo $exception->getMessage();
        }
    }
    public function getByEmail(string $email){
        try {
            $stmt = $this->db->prepare('SELECT * FROM Usuario WHERE email=:email');
            $stmt->bindParam(':email',$email,PDO::PARAM_STR);
            $stmt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, $this->className);
            $stmt->execute();
            return $stmt->fetch();
        }catch (\PDOException $exception){
            echo $exception->getMessage();
        }
    }

    public function getByRol(int $rol):Usuario {
        try {
            $stmt = $this->db->prepare('SELECT * FROM Usuario WHERE rol=:rol');
            $stmt->bindParam(':rol',$rol,PDO::PARAM_INT);
            $stmt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, $this->className);
            $stmt->execute();
            return $stmt->fetch();
        }catch (\PDOException $exception){
            echo $exception->getMessage();
        }
    }

    public function insert(Usuario $usuario){
        try {
            $stmt = $this->db->prepare('INSERT INTO Usuario(rol,nombre,apellidos,email,password,foto_perfil) VALUES(:rol , :nombre,
                                        :apellidos, :email, :password, :foto_perfil)');
            $datos = array(
                ':rol'=>$usuario->getRol(),
                ':nombre'=>$usuario->getNombre(),
                ':apellidos'=>$usuario->getApellidos(),
                ':email'=>$usuario->getEmail(),
                ':password'=>$usuario->getPassword(),
                ':foto_perfil'=>$usuario->getFotoPerfil()
            );
            $stmt->execute($datos);

            if($stmt->rowCount())
                return true;
            else
                return false;

        }catch (\PDOException $exception){
            echo $exception->getMessage();
        }
    }

    public function validate(Usuario $usuario):array {
        $errores = [];

        if (strlen($usuario->getNombre())<=0)
            $errors[]="Nombre vacio";
        if (strlen($usuario->getApellidos())<=0)
            $errors[]="Apellidos vacio";
        if (!filter_var($usuario->getEmail(),FILTER_VALIDATE_EMAIL))
            $errors[]="Formato email no valido";
        if (strlen($usuario->getPassword())<6)
            $errors[]="Contraseña demasidado corta";

        return $errores;

    }

    public function getData():Usuario{
        $usuario = new Usuario();

        $usuario->setRol(3);
        $usuario->setNombre((htmlspecialchars(trim(filter_input(INPUT_POST,'nombre',FILTER_SANITIZE_STRING)))));
        $usuario->setApellidos((htmlspecialchars(trim(filter_input(INPUT_POST,'apellidos',FILTER_SANITIZE_STRING)))));
        $usuario->setEmail((htmlspecialchars(trim(filter_input(INPUT_POST,'email',FILTER_SANITIZE_EMAIL)))));
        $usuario->setPassword((htmlspecialchars(trim(filter_input(INPUT_POST,'password',FILTER_SANITIZE_STRING)))));
        $usuario->setFotoPerfil('imgs/default_profile.jpg');

        return $usuario;

    }

    public function getByEmailPass($email,$password):Usuario{
        try{
            //consulta del ID que solicita el usuario
            $stmt = $this->db->prepare('SELECT * FROM Usuario where email=:email AND password=:password');
            $stmt->bindParam(':email',$email,PDO::PARAM_STR);
            $stmt->bindParam(':password',$password,PDO::PARAM_STR);
            $stmt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, $this->className);
            $stmt->execute();
            return $stmt->fetch();
        }catch (PDOException $e){
            echo $e->getMessage();
        }
    }

    public function validate_login(string $email,string $password):array {
        $errores = [];
        // Comprobar que se han rellenado los campos de login
        if (empty($email))
            $errores['requerido_email'] = "Por favor, indique su email para iniciar sesion";
        elseif (empty($password))
            $errores['requerido_pass'] = "Por favor, indique su contraseña para iniciar sesion";


        if (filter_var($email,FILTER_VALIDATE_EMAIL)){      // si tiene un formato de email correcto...
            try{
                //Comprobar email
                $checkEmail = $this->db->prepare('SELECT email FROM Usuario where email=:email'); // obtener email solicitado
                $checkEmail->execute(array(':email'=>$email));
                $emailResult = $checkEmail->fetch();
                if ($emailResult['email'] !== $email)     // si coincide aprobar validacion, sino no...
                    $errores['email_no_valido'] = "No hay ningun usuario registrado con ese email!";

                // Comprobar contraseña
                $checkPasswd = $this->db->prepare('SELECT password FROM Usuario where email=:email AND password=:password');
                $checkPasswd->execute(array(
                    ':email'=>$email,
                    ':password'=>$password
                ));
                $passwdResult = $checkPasswd->fetch();
                if ($password !== $passwdResult['password'])
                    $errores['pass_no_valido'] = "No coincide la contraseña con el email indicado!";
            }catch (PDOException $e){
                echo $e->getMessage();
            }
        }else
            $errores['formato_email'] = "Ha habido un error, por favor compruebe el correo que ha escrito";

        return $errores;
    }

}