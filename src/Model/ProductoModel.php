<?php
declare(strict_types=1);

namespace App\Model;

use App\Entity\Usuario;
use PDO;
use PDOException;
use DateTime;
use App\Entity\Producto;


/**
 * Class Product_model
 * Las consultas en las que se pida que 'descatalogado' sea 0 son las que estan dadas de altas, las otras son de baja
 * y el cliente no podrá visualizarlas
 *
 * @NOTA_Jorda: En todas los metodos tienen el caso de que la consulta tenga en cuenta o no que este descatalogado
 *              excepto getAll()
 */
class ProductoModel{

    /**
     * @var PDO
     */
    private $db;
    /**
     * @var string
     */
    protected $className = 'App\Entity\Producto';

    /**
     * @param $db
     */
    function __construct(PDO $db){
        $this->db = $db;
    }

    /**
     * @return array
     */
    public  function getAll(): array {
        try{
            $stmt = $this->db->query('SELECT * FROM Producto');
            $productos = $stmt->fetchAll(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, $this->className);

            return $productos;
        }catch (PDOException $exception){
            echo $exception->getMessage();
        }
    }

    /**
     * @return array
     */
    public function getAllCatalogados():array {
        try{
            $stmt = $this->db->query('SELECT * FROM Producto where descatalogado=0');
            $productos = $stmt->fetchAll(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, $this->className);

            return $productos;
        }catch (PDOException $exception){
            echo $exception->getMessage();
        }
    }

    /**
     * @param int $id
     * @return Producto
     */
    public function getById(int $id,int $descatalogado=0):Producto {
        try{
            if ($descatalogado==0)
                $stmt = $this->db->prepare('SELECT * FROM Producto WHERE id_prod = :id');
            else
                $stmt = $this->db->prepare('SELECT * FROM Producto WHERE id_prod = :id AND descatalogado = 0');
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, $this->className);
            $stmt->execute();
            return $stmt->fetch();
        }catch (PDOException $exception){
            echo $exception->getMessage();
        }
    }

    /**
     * @param Usuario $usuario
     * @return array
     */
    public function getByEmpleado(Usuario $usuario):array {
        try{
            $stmt = $this->db->prepare('SELECT * FROM Producto WHERE id_empleado = :id_empleado');
            $stmt->bindParam(':id_empleado', $usuario->getIdCli(), PDO::PARAM_INT);
            $stmt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, $this->className);
            $stmt->execute();
            return $stmt->fetch();
        }catch (PDOException $exception){
            echo $exception->getMessage();
        }
    }

    /**
     * @param int $category
     * @return array
     */
    public function getByCategory(int $categoria,int $descatalogado=0):array {
        try{
            if ($descatalogado == 0)
                $stmt = $this->db->prepare('SELECT * FROM Producto WHERE categoria_prod = :categoria_prod');
            else
                $stmt = $this->db->prepare('SELECT * FROM Producto WHERE categoria_prod = :categoria_prod AND descatalogado=0');
            $stmt->bindParam('categoria_prod', $categoria, PDO::PARAM_INT);
            $stmt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, $this->className);
            $stmt->execute();
            return $stmt->fetchAll();
        }catch (PDOException $exception){
            echo $exception->getMessage();
        }
    }

    /**
     * @param Producto $producto
     * @return bool
     */
    public function insert(Producto $producto):bool {
        try{
            $stmt = $this->db->prepare('INSERT INTO Producto(id_empleado,modelo_prod,marca_prod,categoria_prod,subcategoria_prod,
                                    color,color_disp,talla,talla_disp,stock_prod,num_ventas_prod,fecha_salida,precio_unidad,
                                    foto_prod,descripcion,descatalogado) 
                                    VALUES(:id_empleado, :modelo_prod,:marca_prod,:categoria_prod,:subcategoria_prod,:color,
                                    :color_disp,:talla,:talla_disp,:stock_prod,:num_ventas_prod,:fecha_salida,:precio_unidad,
                                    :foto_prod,:descripcion,:descatalogado)');
            $datos = array(
                ':id_empleado'=>$producto->getIdEmpleado(),
                ':modelo_prod'=>$producto->getModeloProd(),
                ':marca_prod'=>$producto->getMarcaProd(),
                ':categoria_prod'=>$producto->getCategoriaProd(),
                ':subcategoria_prod'=>$producto->getSubcategoriaProd(),
                ':color'=>$producto->getColor(),
                ':color_disp'=>$producto->getColorDisp(),
                ':talla'=>$producto->getTalla(),
                ':talla_disp'=>$producto->getTallaDisp(),
                ':stock_prod'=>$producto->getStockProd(),
                ':num_ventas_prod'=>$producto->getNumVentasProd(),
                ':fecha_salida'=>date("Y-m-d H:i:s"),
                ':precio_unidad'=>$producto->getPrecioUnidad(),
                ':foto_prod'=>$producto->getFotoProd(),
                ':descripcion'=>$producto->getDescripcion(),
                ':descatalogado'=>0
            );
            $stmt->execute($datos);

            if($stmt->rowCount())
                return true;
            else
                return false;
        }catch (PDOException $exception){
            echo $exception->getMessage();
        }
    }

    /**
     * @param Producto $producto
     * @return bool
     */
    public function update(Producto $producto):bool {
        try{
            $stmt = $this->db->prepare('UPDATE Producto SET modelo_prod = :modelo_prod, marca_prod = :marca_prod,
                                    categoria_prod = :categoria_prod, subcategoria_prod = :subcategoria_prod,color = :color, 
                                    color_disp = :color_disp, talla =:talla, talla_disp=:talla_disp,stock_prod=:stock_prod, 
                                    num_ventas_prod=:num_ventas_prod,precio_unidad=:precio_unidad, 
                                    foto_prod=:foto_prod,descripcion=:descripcion,descatalogado=:descatalogado WHERE id_prod = :id_prod');
            $datos = array(
                ':id_prod'=>$producto->getIdProd(),
                ':modelo_prod'=>$producto->getModeloProd(),
                ':marca_prod'=>$producto->getMarcaProd(),
                ':categoria_prod'=>$producto->getCategoriaProd(),
                ':subcategoria_prod'=>$producto->getSubcategoriaProd(),
                ':color'=>$producto->getColor(),
                ':color_disp'=>$producto->getColorDisp(),
                ':talla'=>$producto->getTalla(),
                ':talla_disp'=>$producto->getTallaDisp(),
                ':stock_prod'=>$producto->getStockProd(),
                ':num_ventas_prod'=>$producto->getNumVentasProd(),
                ':precio_unidad'=>$producto->getPrecioUnidad(),
                ':foto_prod'=>$producto->getFotoProd(),
                ':descripcion'=>$producto->getDescripcion(),
                ':descatalogado'=>$producto->getDescatalogado()
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

    /**
     * @return Producto
     */
    public function getLatestProduct():Producto{
        try{
            $stmt = $this->db->query('SELECT * FROM `Producto` WHERE descatalogado=0 AND fecha_salida IN(SELECT MAX(fecha_salida) FROM Producto)');
            $stmt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, $this->className);
            $stmt->execute();
            return $stmt->fetch();
        }catch (PDOException $exception){
            echo $exception->getMessage();
        }
    }

    /**
     * @param $inicio
     * @param $final
     * @param $busqueda
     * @param int $categoria
     * @param array $fechas
     * @param int $descatalogado
     * @return array
     *
     * Podria haberlo hecho alguna especie switch teniendo en cuenta dos el valor de 2 variables?
     */
    public function getProdsTienda(int $inicio, int  $final, string $busqueda, int $categoria = 0, array $fechas=[], int $descatalogado=0):array {
        try{
            /**@CASO_1: Buscar por categoria solo **/
            if($categoria !=0 && empty($fechas)){
                if ($descatalogado==0)
                    $stmt = $this->db->prepare('SELECT * FROM Producto WHERE categoria_prod = :categoria LIMIT :inicio , :final');
                else
                    $stmt = $this->db->prepare('SELECT * FROM Producto WHERE descatalogado=0 AND categoria_prod = :categoria LIMIT :inicio , :final');
                $stmt->bindParam(':inicio',$inicio,PDO::PARAM_INT);
                $stmt->bindParam(':final',$final,PDO::PARAM_INT);
                $stmt->bindParam(':categoria',$categoria,PDO::PARAM_INT);
                $stmt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, $this->className);
                $stmt->execute();

                /**@CASO_2: Buscar por fecha **/
            }elseif ($categoria == 0 && !empty($fechas)){
                if($descatalogado==0)
                    $stmt = $this->db->prepare('SELECT * FROM Producto WHERE fecha_salida BETWEEN :fecha_inicial AND :fecha_final LIMIT :inicio , :final');
                else
                    $stmt = $this->db->prepare('SELECT * FROM Producto WHERE descatalogado=0 AND fecha_salida BETWEEN :fecha_inicial AND :fecha_final LIMIT :inicio , :final');
                $stmt->bindParam(':inicio',$inicio,PDO::PARAM_INT);
                $stmt->bindParam(':final',$final,PDO::PARAM_INT);
                $stmt->bindParam(':fecha_inicial', $fechas['fecha_inicial']);
                $stmt->bindParam(':fecha_final', $fechas['fecha_final']);
                $stmt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, $this->className);
                $stmt->execute();

                /**@CASO_3: Buscar por la barra de busqueda **/
            }elseif ($_SERVER['REQUEST_METHOD']==='GET' && array_key_exists('search',$_GET)){
                $stmt = $this->db->prepare('SELECT * FROM Producto WHERE descatalogado=0 AND modelo_prod LIKE :busqueda OR marca_prod LIKE :busqueda2 LIMIT :inicio , :final');
                $stmt->bindValue(":busqueda","%$busqueda%",PDO::PARAM_STR);
                $stmt->bindValue(":busqueda2","%$busqueda%",PDO::PARAM_STR);
                $stmt->bindValue(":inicio",$inicio,PDO::PARAM_INT);
                $stmt->bindValue(":final",$final,PDO::PARAM_INT);
                $stmt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, $this->className);
                $stmt->execute();
            }else{
                /**@CASO_4: Sacar todos los productos **/
                if ($descatalogado==0)
                    $stmt = $this->db->prepare('SELECT * FROM Producto LIMIT :inicio , :final');
                else
                    $stmt = $this->db->prepare('SELECT * FROM Producto WHERE descatalogado=0 LIMIT :inicio , :final');
                $stmt->bindParam(':inicio',$inicio,PDO::PARAM_INT);
                $stmt->bindParam(':final',$final,PDO::PARAM_INT);
                $stmt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, $this->className);
                $stmt->execute();

            }
            return $stmt->fetchAll();
        }catch (PDOException $exception){
            echo $exception->getMessage();
        }
    }

    /**
     * @return array
     */
    public function getTT():array {
        try{
            $stmt = $this->db->query('SELECT * FROM `Producto` WHERE descatalogado=0 ORDER BY num_ventas_prod DESC LIMIT 5');
            $stmt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, $this->className);
            $stmt->execute();
            return $stmt->fetchAll();
        }catch (PDOException $exception){
            echo $exception->getMessage();
        }
    }

    /**
     * @return array
     */
    public function getNovedades():array {
        try{
            $stmt = $this->db->query('SELECT * FROM `Producto` WHERE descatalogado=0 ORDER BY fecha_salida DESC LIMIT 5');
            $stmt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, $this->className);
            $stmt->execute();
            return $stmt->fetchAll();
        }catch (PDOException $exception){
            echo $exception->getMessage();
        }
    }

    /**
     * @param $fecha_inicial
     * @param $fecha_final
     * @param $categoria
     * @param int $descatalogado
     * @return array
     */
    public function getPorDosFechas(string $fecha_inicial,string $fecha_final,int $categoria=0,int $descatalogado=0):array {
        try{
            // EN EL CASO DE QUE NO SE ESPECIFIQUE LA CATEGORIA NI SE FILTRE POR FECHA
            if ($categoria == 0 && empty($fechas)){
                if ($descatalogado == 0)
                    $stmt = $this->db->prepare("SELECT * FROM `Producto` WHERE fecha_salida BETWEEN :fecha_inicial AND :fecha_final");
                else
                    $stmt = $this->db->prepare("SELECT * FROM `Producto` WHERE descatalogado=0 AND fecha_salida BETWEEN :fecha_inicial AND :fecha_final");
                $stmt->bindParam(':fecha_inicial', $fecha_inicial);
                $stmt->bindParam(':fecha_final', $fecha_final);
                $stmt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, $this->className);
                $stmt->execute();
                return $stmt->fetchAll();
            }else{
                // SI SE ESPECIFICA LA CATEGORIA, FILTRAR PRODUCTOS DE LOS PRODUCTOS DE DICHA CATEGORIA ENTRE LAS FECHAS INDICADAS
                if ($descatalogado==0)
                    $stmt = $this->db->prepare('SELECT * FROM `Producto` WHERE categoria_prod = :categoria_prod AND fecha_salida BETWEEN :fecha_inicial AND :fecha_final');
                else
                    $stmt = $this->db->prepare('SELECT * FROM `Producto` WHERE descatalogado=0 categoria_prod = :categoria_prod AND fecha_salida BETWEEN :fecha_inicial AND :fecha_final');
                $stmt->bindParam(':categoria_prod',$categoria,PDO::PARAM_INT);
                $stmt->bindParam(':fecha_inicial', $fecha_inicial,PDO::PARAM_STR);
                $stmt->bindParam(':fecha_final', $fecha_final,PDO::PARAM_STR);
                $stmt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, $this->className);
                $stmt->execute();
                return $stmt->fetchAll();
            }
        }catch (PDOException $exception){
            echo $exception->getMessage();
        }
    }

    /**
     * @param $categoria
     * @return mixed
     */
    public function getTotalStockCategorias(int $categoria){
        try{
            $stmt = $this->db->prepare('SELECT count(id_prod) as "stock" FROM `Producto` WHERE categoria_prod = :categoria AND descatalogado=0');
            $stmt->bindParam(':categoria',$categoria,PDO::PARAM_INT);
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $stmt->execute();

            return $stmt->fetch();
        }catch (PDOException $exception){
            echo $exception->getMessage();
        }
    }

    /**
     * @param $busqueda
     * @param int $descatalogado
     * @return array
     */
    public function getPorBuscador(string $busqueda):array {
        try{
            $stmt = $this->db->prepare('SELECT * FROM Producto WHERE descatalogado=0 AND modelo_prod LIKE :busqueda OR marca_prod LIKE :busqueda2');
            $stmt->bindValue(':busqueda',"%$busqueda%",PDO::PARAM_STR);
            $stmt->bindValue(':busqueda2',"%$busqueda%",PDO::PARAM_STR);
            $stmt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, $this->className);
            $stmt->execute();
            return $stmt->fetchAll();
        }catch (PDOException $exception){
            echo $exception->getMessage();
        }
    }

    /**
     * @param $id_prod
     * @return mixed
     */
    public function selectPedido(int $id_prod){
        $id = $id_prod;
        try{
            $stmt = $this->db->prepare('SELECT * FROM Pedido WHERE id_prod = :id');
            $stmt->bindParam(':id',$id);
            $stmt->execute();

            return $stmt->fetchAll();
        }catch (PDOException $exception){
            echo $exception->getMessage();
        }
    }

    /**
     * @param $id
     * @return bool
     */
    public function delete(int $id):bool{
        $id_prod = $id;
        try{
            $pedido = $this->selectPedido($id_prod);
            $this->db->beginTransaction();

            if ($pedido>0){
                $stmt = $this->db->prepare('DELETE FROM Pedido WHERE id_prod = :id');
                $stmt->bindParam(':id',$id_prod);
                $stmt->execute();
            }
            $stmt = $this->db->prepare('DELETE FROM Producto WHERE id_prod=:id');
            $stmt->bindParam(':id',$id_prod);
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



    /**
     * @param Producto $producto
     * @return array
     */
    public function validate(Producto $producto):array {
        $errors = [];
        // id producto
        if (!filter_var($producto->getIdProd(),FILTER_VALIDATE_INT))
            $errors[]="El id no es un entero";
        //categoria
        if ($producto->getCategoriaProd()<1 || $producto->getCategoriaProd()>3)
            $errors[]="Categoria no existe";
        //subcategoria
        if ($producto->getSubcategoriaProd()<1 || $producto->getSubcategoriaProd()>11)
            $errors[]="Categoria no existe";
        //color_disp
        if (!filter_var($producto->getColorDisp(),FILTER_VALIDATE_INT))
            $errors[]="Cantidad de colores no es un numero";
        //talla_disp
        if (!filter_var($producto->getTallaDisp(),FILTER_VALIDATE_INT))
            $errors[]="Cantidad de tallas no es un numero";
        //stock
        if (!filter_var($producto->getStockProd(),FILTER_VALIDATE_INT))
            $errors[]="Cantidad de stock no es un numero";
        //num_ventas
        if (!is_int($producto->getNumVentasProd()))
            $errors[]="Cantidad de ventas del producto no es un numero";
        //precio
        if (!filter_var($producto->getPrecioUnidad(),FILTER_VALIDATE_FLOAT, FILTER_FLAG_ALLOW_FRACTION))
            $errors[]="Cantidad de precio no es un float";
        //foto
        $foto = explode(".",$producto->getFotoProd());
        if (end($foto) ===".jpg" || end($foto)===".png")
            $errors[]="Formato de imagen incorrecto, debe ser png o jpg";

        return $errors;
    }

    /**
     * @param Producto $producto
     * @return array
     */
    public function validateCrearProducto(Producto $producto):array {
        $errors = [];
        //categoria
        if ($producto->getCategoriaProd()<1 || $producto->getCategoriaProd()>3)
            $errors[]="Categoria no existe";
        //subcategoria
        if ($producto->getSubcategoriaProd()<1 || $producto->getSubcategoriaProd()>11)
            $errors[]="Categoria no existe";
        //color_disp
        if (!filter_var($producto->getColorDisp(),FILTER_VALIDATE_INT))
            $errors[]="Cantidad de colores no es un numero";
        //talla_disp
        if (!filter_var($producto->getTallaDisp(),FILTER_VALIDATE_INT))
            $errors[]="Cantidad de tallas no es un numero";
        //stock
        if (!filter_var($producto->getStockProd(),FILTER_VALIDATE_INT))
            $errors[]="Cantidad de stock no es un numero";
        //precio
        if (!filter_var($producto->getStockProd(),FILTER_VALIDATE_FLOAT))
            $errors[]="Cantidad de precio no es un float";
        //foto

        return $errors;
    }

    /**
     * @return Producto
     */
    public function getData():Producto{
        $producto = new Producto();
        global $user;
        /** @FUNCION: ASIGNAR ATRIBUTO QUITANDO CHARS HTML, ESPACIOS CON TRIM Y SANEANDOLOS **/
        $producto->setModeloProd(htmlspecialchars(trim(filter_input(INPUT_POST,'modelo',FILTER_SANITIZE_STRING))));
        // Los separo el primero para visualizar mejor su contenido ya que todos tienen lo mismo excepto el tipo de saneo

        $producto->setIdEmpleado($user->getIdCli());
        $producto->setMarcaProd(htmlspecialchars(trim(filter_input(INPUT_POST,'marca',FILTER_SANITIZE_STRING))));
        $producto->setCategoriaProd((int)htmlspecialchars(trim(filter_input(INPUT_POST, 'categoria', FILTER_SANITIZE_NUMBER_INT))));
        $producto->setSubcategoriaProd((int)htmlspecialchars(trim(filter_input(INPUT_POST, 'subcategoria', FILTER_SANITIZE_NUMBER_INT))));
        $producto->setColor(htmlspecialchars(trim(filter_input(INPUT_POST,'color',FILTER_SANITIZE_STRING))));
        $producto->setColorDisp((int)htmlspecialchars(trim(filter_input(INPUT_POST, 'stock', FILTER_SANITIZE_NUMBER_INT))));
        $producto->setTalla(strtolower(htmlspecialchars(trim(filter_input(INPUT_POST,'talla',FILTER_SANITIZE_STRING)))));
        $producto->setTallaDisp((int)htmlspecialchars(trim(filter_input(INPUT_POST,'stock',FILTER_SANITIZE_NUMBER_INT))));
        $producto->setStockProd((int)htmlspecialchars(trim(filter_input(INPUT_POST,'stock',FILTER_SANITIZE_NUMBER_INT))));
        $producto->setPrecioUnidad((float)htmlspecialchars(trim(filter_input(INPUT_POST,'precio',FILTER_SANITIZE_NUMBER_FLOAT,FILTER_FLAG_ALLOW_FRACTION))));
        $producto->setDescatalogado((int)htmlspecialchars(trim(filter_input(INPUT_POST,'descatalogado',FILTER_SANITIZE_NUMBER_INT))));
        $producto->setFotoProd(htmlspecialchars(trim(filter_input(INPUT_POST,'urlfoto',FILTER_SANITIZE_URL))));
        $producto->setDescripcion(htmlspecialchars(trim(filter_input(INPUT_POST,'descripcion',FILTER_SANITIZE_STRING))));
        return $producto;
    }
}