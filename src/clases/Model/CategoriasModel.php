<?php


class CategoriasModel
{
    /********************************************* ATRIBUTOS *********************************************/
    private $db;

    /********************************************* CONSTRUCTOR ******************************************
     * @param $db
     */
    function __construct(DB $db){
        $this->db = $db;
    }
    /********************************************* METODOS ***********************************************/
    public function getById(int $id):Categorias{
        try{
            $stmt = $this->db->prepare('SELECT * FROM Categorias WHERE id_cat=:id');
            $stmt->bindParam(':id',$id,PDO::PARAM_INT);
            $stmt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Categorias');
            $stmt->execute();
            return $stmt->fetch();
        }catch (PDOException $exception){
            die($exception->getMessage());
        }
    }

    public function getByQuery():int{
        if(!array_key_exists('categoria',$_GET)){
            $categoria = 'todo';
        }else
            $categoria = $_GET['categoria'];

        switch ($categoria){
            case 'todo':
                $categoria = 0;
                break;
            case 'accesorios':
                $categoria = 1;
                break;
            case 'ropa':
                $categoria = 2;
                break;
            case 'zapatillas':
                $categoria = 3;
                break;
            default:
                $categoria = 0;
        }
        return $categoria;
    }

}