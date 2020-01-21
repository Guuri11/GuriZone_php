<?php


namespace App\Controller;

use App\Entity\Paginacion_productos;
use App\Entity\Paginacion_usuarios;
use App\Entity\Usuario;
use App\Model\CategoriasModel;
use App\Model\ProductoModel;
use App\Model\RolesModel;
use App\Model\UsuarioModel;
use PDOException;


class UsuarioController extends AbstractController
{
    public function registrarse(){
        global $rol_usuario, $user;
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
                    $errores[$dato] = "Por favor, introduzca su ".$dato;
                }
            }

            //Comprobar que el email es valido
            if (!filter_var($datos['email'],FILTER_VALIDATE_EMAIL)){
                $errores['email_no_valido'] = "Ha habido un error, por favor compruebe el correo que ha escrito.";
            }
            if ($usuariosConsulta->getByEmail($datos['email']) !== false){
                $errores['email_registrado'] = "Ya existe un usuario registrado con este email.";
            }
            //Comprobar que la contraseña sea valida
            if (strlen($datos['password'])<6)
                $errores['pass_corta'] = "Contraseña demasiado corta! Necesita 6 carácteres como mínimo.";
            if ($datos['password']!==$datos['password_repeat'])
                $errores['pass_no_igual'] = "Las contraseñas no coinciden!";

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
                    // Si ha habido un error en la insercion se notifica, sino se redirige al perfil del usuario
                    if (!$resultado)
                        $errores[]="Error al crear usuario";
                    else{
                        $login = true;
                        try{
                            // Cambiar rol de usuario
                            $user = $usuariosConsulta->getUserLoggued($usuario->getEmail(),$login); // Obtener ID del usuario
                        }catch (PDOException $exception){
                            echo $exception->getMessage();
                        }

                        // Cambiar valor de la sesions
                        $rol_usuario = $user->getTipoRol();
                        $id_usuario = $user->getIdCli();
                        $_SESSION['rol'] = $rol_usuario;
                        $_SESSION['id_user'] = $id_usuario;
                        $_SESSION['loggued'] = true;
                        $_SESSION['time'] = time();

                        global $route;
                        header("Location: ".$route->generateURL('Usuario','perfil')); // redirigir al perfil
                    }

                }
            }
        }

        return $this->render('registrarse.twig',[
            'usuario'=>$rol_usuario,
            'ultimo_producto'=>$ultimoProducto,
            'errores'=>$errores
        ]);
    }

    public function login(){
        global $rol_usuario, $user;
        $productosConsulta = new ProductoModel($this->db);
        $usuarioConsulta = new UsuarioModel($this->db);
        $ultimoProducto = $productosConsulta->getLatestProduct();
        $errores = [];
        $login = false;

        // Si se ha recibido datos desde el login.view
        if ($_SERVER['REQUEST_METHOD']==='POST'){

            // Obtener email y contraseña saneadas
            $email = htmlspecialchars(trim($_POST['email']));
            $email = filter_var($email,FILTER_SANITIZE_EMAIL);
            $password = htmlspecialchars(trim($_POST['password']));

            // Validar datos
            $errores = $usuarioConsulta->validate_login($email,$password);

            if (count($errores)===0){
                $login = true;
                try{
                    // Cambiar rol de usuario
                    $user = $usuarioConsulta->getUserLoggued($email,$login); // Obtener ID del usuario
                }catch (PDOException $exception){
                    echo $exception->getMessage();
                }

                // Cambiar valor de la sesions
                $rol_usuario = $user->getTipoRol();
                $id_usuario = $user->getIdCli();
                $_SESSION['rol'] = $rol_usuario;
                $_SESSION['id_user'] = $id_usuario;
                $_SESSION['loggued'] = true;
                $_SESSION['time'] = time();
                global $route;
                header("Location: ".$route->generateURL('Usuario','perfil')); // redirigir al perfil
            }

        }
        return $this->render('login.twig',[
            'usuario'=>$rol_usuario,
            'ultimo_producto'=>$ultimoProducto,
            'errores'=>$errores
        ]);
    }

    public function logout(){
        global $rol_usuario, $user;
        try{
            // 1. Transformar usuario a anonimo
            $usuario_modelo = new UsuarioModel($this->db);
            $user = $usuario_modelo->getById(1);
        }catch (PDOException $exception){
            echo $exception->getMessage();
        }
        // 2. Cambiar valor de la cookie
        session_unset();
        setcookie(session_name(),"",time()-3600);
        session_destroy();
        global $route;
        header("Location: ".$route->generateURL('Producto','index')); // redirigir al perfil

    }

    public function perfil(){

        global $rol_usuario,$user;
        $productosConsulta = new ProductoModel($this->db);
        $ultimoProducto = $productosConsulta->getLatestProduct();

        // Controlar que el usuario anonimo no puede entrar a la vista profile
        if ($rol_usuario === 'anonimo'){
            global $route;
            header("Location: ".$route->generateURL('Usuario','login')); // redirigir al perfil
        }
        else{
            return $this->render('perfil.twig',[
                'usuario'=>$rol_usuario,
                'ultimo_producto'=>$ultimoProducto,
                'user'=>$user
            ]);
        }
    }

    public function dashboard(){
        global $rol_usuario,$user;
        $productosConsulta = new ProductoModel($this->db);
        $ultimoProducto = $productosConsulta->getLatestProduct();

        // Capa de proteccion para acceder al dashboard
        if ( $rol_usuario === 'admin'){
            return $this->render('dashboard.twig',[
                'usuario'=>$rol_usuario,
                'ultimo_producto'=>$ultimoProducto
            ]);
        } else{
            global $request;
            $errorController = new ErrorController($this->di, $request);
            return $errorController->notFound();
        }
    }

    public function contactanos(){
        global $rol_usuario,$user;
        $productosConsulta = new ProductoModel($this->db);
        $ultimoProducto = $productosConsulta->getLatestProduct();

        return $this->render('contactus.twig',[
            'usuario'=>$rol_usuario,
            'ultimo_producto'=>$ultimoProducto,
        ]);
    }

    public function gestionProductos(){
        global $rol_usuario,$user;
        $productosConsulta = new ProductoModel($this->db);
        $categoriaConsulta = new CategoriasModel($this->db);
        $ultimoProducto = $productosConsulta->getLatestProduct();
        $fecha_inicial = NULL;
        $fecha_final = NULL;
        $categoria = 'todo';

        // Capa de proteccion para acceder al dashboard
        if ( $rol_usuario === 'admin' || $rol_usuario === 'empleado'){
            // Filtro por categoria

            // asignar valor a categoria en caso de que no se especifique
            if (!$this->request->getParams()->has('categoria') || empty($this->request->getParams()->get('categoria')))
                $this->request->getParams()->set('categoria','todo');
            $categoria = trim(filter_var($this->request->getParams()->get('categoria'),FILTER_SANITIZE_STRING));


            // Obtener todos los productos o los de la categoria especificada (control del usuario que entra)
            if ($categoria === 'todo' && $rol_usuario === 'admin')
                $productos = $productosConsulta->getAll();
            elseif ($categoria === 'todo' && $rol_usuario === 'empleado'){
                $productos = $productosConsulta->getByEmpleado($user->getIdCli());
            } elseif ($categoria !=='todo' && $rol_usuario==='admin'){
                $categoria_tipo = $categoriaConsulta->getByTipoCat($categoria);
                $productos = $productosConsulta->getByCategory($categoria_tipo->getIdCat());
            }else{
                $categoria_tipo = $categoriaConsulta->getByTipoCat($categoria);
                $productos = $productosConsulta->getByCategory($categoria_tipo->getIdCat(),0,$user->getIdCli());
            }

            // Filtro por fecha
            if ($_SERVER['REQUEST_METHOD'] === 'GET' && $this->request->getParams()->has('fecha_inicial') && $this->request->getParams()->has('fecha_final')) {

                $fecha_inicial = filter_var($this->request->getParams()->get('fecha_inicial'),FILTER_SANITIZE_STRING);
                $fecha_final = filter_var($this->request->getParams()->get('fecha_final'),FILTER_SANITIZE_STRING);

                // Obtener productos segun la categoria en las fechas marcadas
                if ($rol_usuario==='admin'){
                    $categoria_tipo = $categoriaConsulta->getByTipoCat(ucfirst($categoria));
                    $productos = $productosConsulta->getPorDosFechas($fecha_inicial, $fecha_final, $categoria_tipo->getIdCat());
                }else{
                    $categoria_tipo = $categoriaConsulta->getByTipoCat(ucfirst($categoria));
                    $productos = $productosConsulta->getPorDosFechas($fecha_inicial, $fecha_final, $categoria_tipo->getIdCat(),$user->getIdCli());
                }
            }

            // Si la pagina introducida es menor de 1 o no existe poner la pagina 1
            if(!$this->request->getParams()->has('page') || $this->request->getParams()->get('page')<=0)
                $this->request->getParams()->set('page','1');

            $pagina = filter_var($this->request->getParams()->get('page'),FILTER_VALIDATE_INT);

            if ($rol_usuario==='admin')
                $paginacion = new Paginacion_productos(count($productos),10,$pagina,$productosConsulta,"",0);
            else
                $paginacion = new Paginacion_productos(count($productos),10,$pagina,$productosConsulta,"",0,$user->getIdCli());

            $parametros = [
                'usuario'=>$rol_usuario,
                'ultimo_producto'=>$ultimoProducto,
                'fecha_inicial'=>$fecha_inicial,
                'fecha_final'=>$fecha_final,
                'paginacion'=>$paginacion,
                'pagina'=>$pagina,
                'categoria'=>$categoria
            ];
            return $this->render('gestion_productos.twig',$parametros);
        } else{
            global $request;
            $errorController = new ErrorController($this->di, $request);
            return $errorController->notFound();
        }
    }

    public function gestionUsuarios(){

        global $rol_usuario,$user;
        $productosConsulta = new ProductoModel($this->db);
        $categoriaConsulta = new CategoriasModel($this->db);
        $usuarioConsulta = new UsuarioModel($this->db);
        $rolConsulta = new RolesModel($this->db);
        $ultimoProducto = $productosConsulta->getLatestProduct();
        $confirmacion = "";
        $error = "";

        if ( $rol_usuario === 'admin'){

            // Si se ha solicitado cambiar el rol de los usuarios, comprobar y actualizar:
            if ($_SERVER['REQUEST_METHOD'] === 'POST'){
                // Obtener datos y sanearlos
                $key = array_keys($_POST);
                $rol_seleccionado = filter_input(INPUT_POST,$key[0],FILTER_SANITIZE_FULL_SPECIAL_CHARS,FILTER_SANITIZE_STRING);

                // Separar el dato obtenido-> id_usuario - rol seleccionado
                $rol_seleccionado = explode('-',$rol_seleccionado);

                // Comprobar que el rol es valido, si lo es: realizazamos cambios
                if ($rol_seleccionado[1] === '1' || $rol_seleccionado[1] === '2' || $rol_seleccionado[1] === '3' ||
                    $rol_seleccionado[1] === '4'){
                    $resultado = $usuarioConsulta->updateRol(intval($rol_seleccionado[1]),intval($rol_seleccionado[0]));
                    if ($resultado){
                        $confirmacion = "Se ha actualizado el usuario con exito";
                    }
                }else
                    $error = "Rol seleccionado no existente";

            }

            // Filtro por rol
            // asignar valor a rol en caso de que no se especifique
            if (!$this->request->getParams()->has('rol') || empty($this->request->getParams()->get('rol')))
                $this->request->getParams()->set('rol','todo');
            $rol = trim(filter_var($this->request->getParams()->get('rol'),FILTER_SANITIZE_STRING));

            // Obtener todos los productos o los de la categoria especificada
            if ($rol == 'todo')
                $usuarios = $usuarioConsulta->getAll();
            else{
                $obj_rol = $rolConsulta->getByTipoRol($rol);
                $usuarios = $usuarioConsulta->getByRol($obj_rol->getIdRol());
            }

            // Si la pagina introducida es menor de 1 o no existe poner la pagina 1
            if(!$this->request->getParams()->has('page') || $this->request->getParams()->get('page')<=0)
                $this->request->getParams()->set('page','1');

            $pagina = filter_var($this->request->getParams()->get('page'),FILTER_VALIDATE_INT);
            $paginacion = new Paginacion_usuarios(count($usuarios),5,intval($pagina),$usuarioConsulta);

            $parametros = [
                'usuario'=>$rol_usuario,
                'ultimo_producto'=>$ultimoProducto,
                'paginacion'=>$paginacion,
                'pagina'=>$pagina,
                'rol'=>$rol,
                'confirmacion'=>$confirmacion,
                'error'=>$error
            ];
            return $this->render('gestion_usuarios.twig',$parametros);
        }else{
            //global $route;
            //header("Location: ".$route->generateURL('Producto','index')); // redirigir al inicio
            global $request;
            $errorController = new ErrorController($this->di, $request);
            return $errorController->notFound();
        }


    }

    public function borrarUsuario(int $id){
        global $rol_usuario,$user;
        $productosConsulta = new ProductoModel($this->db);
        $categoriaConsulta = new CategoriasModel($this->db);
        $usuarioConsulta = new UsuarioModel($this->db);
        $rolConsulta = new RolesModel($this->db);
        $ultimoProducto = $productosConsulta->getLatestProduct();

        // Capa de proteccion para acceder al dashboard
        if ( $rol_usuario === 'admin'){
            // 1. Averiguar si se ha solicitado eliminar un producto y filtrarlo
            if($_SERVER['REQUEST_METHOD']=='POST' && $this->request->getParams()->has('borrar')){
                $borrar = filter_input(INPUT_POST,'borrar',FILTER_SANITIZE_STRING);
                $borrar = filter_var($this->request->getParams()->get('borrar'),FILTER_SANITIZE_STRING);
                if ($borrar === 'true'){
                    $id = filter_var($id, FILTER_SANITIZE_NUMBER_INT);
                    // 2. Eliminar usuario
                    $resultado = $usuarioConsulta->delete($id);
                    global $route;
                    if (!$resultado){
                        global $request;
                        $errorController = new ErrorController($this->di, $request);
                        return $errorController->notFound();
                    } else{
                        header('Location: '.$route->generateURL('Usuario','gestionUsuarios'));
                    }
                }
            }
            return $this->render('borrar_usuario.twig',[
                'usuario'=>$rol_usuario,
                'ultimo_producto'=>$ultimoProducto,
                'id'=>$id
            ]);
        }else{
            global $route;
            header("Location: " . $route->generateURL('Producto', 'index')); // redirigir al inicio
        }
    }

    public function cambiarPass(){
        global $rol_usuario,$user;
        $productosConsulta = new ProductoModel($this->db);
        $categoriaConsulta = new CategoriasModel($this->db);
        $usuarioConsulta = new UsuarioModel($this->db);
        $rolConsulta = new RolesModel($this->db);
        $ultimoProducto = $productosConsulta->getLatestProduct();
        $errores = [];
        $datos_enviados = false;

        // Controlar que el usuario anonimo no puede entrar a la vista profile
        if ($rol_usuario === 'anonimo'){
            global $route;
            header("Location: ".$route->generateURL('Usuario','login')); // redirigir al perfil
        }
        if ($_SERVER['REQUEST_METHOD']==='POST'){
            //Recogemos los datos
            $datos = $_POST;
            $datos_enviados = true;

            // Comprobar que todos los campos han sido rellenados
            foreach ($datos as $dato => $valor) {
                if (empty($valor)) {
                    $errores[$dato] = "Por favor, introduzca su ".$dato;
                }
            }
            var_dump($errores);
            $pass_vieja = filter_input(INPUT_POST,'old_password',FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $pass_nueva = filter_input(INPUT_POST,'new_password',FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $pass_repetida = filter_input(INPUT_POST,'password_repeat',FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            // validar contraseña vieja
            $old_pass = $usuarioConsulta->getById($user->getIdCli())->getPassword();
            var_dump($old_pass);
            var_dump($pass_vieja);

            if (password_verify($pass_vieja,$old_pass)){
                // si es valida comprobamos la longitud de la nueva
                //Comprobar que la contraseña sea valida
                if (strlen($pass_nueva)<6)
                    $errores['pass_corta'] = "Contraseña demasiado corta! Necesita 6 carácteres como mínimo.";
                    // si son la misma actualizamos datos
                if ($pass_nueva !== $pass_repetida)
                    $errores['pass_no_igual'] = "Las contraseñas no coinciden!";
                else{
                    $actualizacion_exitosa = $usuarioConsulta->updatePass($pass_nueva,$user->getIdCli());
                    if (!$actualizacion_exitosa)
                        $errores[] = "Error al modificar contraseña";
                }
            }else{
                $errores['old_pass_error']='No coincide su contraseña con la introducida!';
            }
        }
        return $this->render('editar_pass.twig',[
            'usuario'=>$rol_usuario,
            'ultimo_producto'=>$ultimoProducto,
            'user'=>$user,
            'errores'=>$errores,
            'datos_enviados'=>$datos_enviados
        ]);


    }



}