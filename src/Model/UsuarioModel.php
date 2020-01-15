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
    public function getAll():array{
        try{
            $stmt = $this->db->query('SELECT * FROM Usuario');
            $usuarios = $stmt->fetchAll(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, $this->className);

            return $usuarios;
        }catch (PDOException $exception){
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

    public function getByRol(int $rol):array {
        try {
            $stmt = $this->db->prepare('SELECT * FROM Usuario WHERE rol=:rol');
            $stmt->bindParam(':rol',$rol,PDO::PARAM_INT);
            $stmt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, $this->className);
            $stmt->execute();
            return $stmt->fetchAll();
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
                ':password'=>password_hash($usuario->getPassword(),PASSWORD_DEFAULT),
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
        $usuario->setApellidos((htmlspecialchars(trim(filter_input(INPUT_POST,'apellido',FILTER_SANITIZE_STRING)))));
        $usuario->setEmail((htmlspecialchars(trim(filter_input(INPUT_POST,'email',FILTER_SANITIZE_EMAIL)))));
        $usuario->setPassword((htmlspecialchars(trim(filter_input(INPUT_POST,'password',FILTER_SANITIZE_STRING)))));
        $usuario->setFotoPerfil('imgs/default_profile.jpg');

        return $usuario;

    }

    public function getUserLoggued(string $email,bool $login):Usuario{
        try{
            if ($login){
                //consulta del ID que solicita el usuario
                $stmt = $this->db->prepare('SELECT * FROM Usuario where email=:email');
                $stmt->bindParam(':email',$email,PDO::PARAM_STR);
                $stmt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, $this->className);
                $stmt->execute();
                return $stmt->fetch();
            }
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
                $checkPasswd = $this->db->prepare('SELECT password FROM Usuario where email=:email');
                $checkPasswd->execute(array(
                    ':email'=>$email,
                    ':password'=>$password
                ));
                $passwdResult = $checkPasswd->fetch();
                if (!password_verify($password,$passwdResult['password']))
                    $errores['pass_no_valido'] = "No coincide la contraseña con el email indicado!";
            }catch (PDOException $e){
                echo $e->getMessage();
            }
        }else
            $errores['formato_email'] = "Ha habido un error, por favor compruebe el correo que ha escrito";

        return $errores;
    }

    public function getUsuariosGestion(int $usuario_inicial, int $usuarios_pagina, int $rol):array{
        try {
            if ($rol === 0){
                $stmt = $this->db->prepare('SELECT * FROM Usuario LIMIT :usuario_inicial, :usuarios_pagina');
                $stmt->bindParam(':usuario_inicial',$usuario_inicial,PDO::PARAM_INT);
                $stmt->bindParam(':usuarios_pagina',$usuarios_pagina,PDO::PARAM_INT);
                $stmt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, $this->className);
                $stmt->execute();
                return $stmt->fetchAll();
            }else{
                $stmt = $this->db->prepare('SELECT * FROM Usuario WHERE rol = :rol LIMIT :usuario_inicial, :usuarios_pagina');
                $stmt->bindParam(':rol',$rol);
                $stmt->bindParam(':usuario_inicial',$usuario_inicial,PDO::PARAM_INT);
                $stmt->bindParam(':usuarios_pagina',$usuarios_pagina,PDO::PARAM_INT);
                $stmt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, $this->className);
                $stmt->execute();
                return $stmt->fetchAll();
            }
        }catch (PDOException $exception){
            echo $exception->getMessage();
        }
    }

    public function updateRol(int $rol,int $id):bool{
        var_dump($rol);
        var_dump($id);
        try{
            $stmt = $this->db->prepare('UPDATE Usuario SET rol=:rol WHERE id_cli=:id_cli');
            $datos = array(
                ':id_cli'=>$id,
                ':rol'=>$rol,
            );
            $stmt->execute($datos);
            if ($stmt->rowCount()){
                return true;
            }
            else
                return false;
        }catch (PDOException $exception){
            echo $exception->getMessage();
        }
    }

    public function selectPedidos(int $id){
        try{
            $stmt = $this->db->prepare('SELECT * FROM Pedidos WHERE cliente = :id');
            $stmt->bindParam(':id',$id);
            $stmt->execute();

            return $stmt->fetchAll();
        }catch (PDOException $exception){
            echo $exception->getMessage();
        }
    }
    public function selectProductos(int $id){
        try{
            $stmt = $this->db->prepare('SELECT * FROM Productos WHERE id_empleado = :id');
            $stmt->bindParam(':id',$id);
            $stmt->execute();

            return $stmt->fetchAll();
        }catch (PDOException $exception){
            echo $exception->getMessage();
        }
    }

    public function delete(int $id):bool{
        try{
            $pedidos = $this->selectPedidos($id);
            $productos = $this->selectProductos($id);
            $this->db->beginTransaction();


            if ($pedidos>0){
                $stmt = $this->db->prepare('DELETE FROM Pedidos WHERE cliente = :id');
                $stmt->bindParam(':id',$id);
                $stmt->execute();
            }
            if ($productos>0){
                $stmt = $this->db->prepare('DELETE FROM Productos WHERE id_empleado = :id');
                $stmt->bindParam(':id',$id);
                $stmt->execute();
            }

            $stmt = $this->db->prepare('DELETE FROM Usuario WHERE id_cli=:id');
            $stmt->bindParam(':id',$id);
            $stmt->execute();
            $this->db->commit();
            if ($stmt->rowCount())
                return true;
            else
                return false;
        }catch (PDOException $exception){
            echo $exception->getMessage();
        }
    }
}