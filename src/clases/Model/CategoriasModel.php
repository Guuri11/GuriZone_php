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

    public function getByTipoCat(string $tipo_cat):Categorias{
        try{
            $stmt = $this->db->prepare('SELECT * FROM Categorias WHERE tipo_cat=:tipo_cat');
            $stmt->bindParam(':tipo_cat',$tipo_cat,PDO::PARAM_STR);
            $stmt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Categorias');
            $stmt->execute();
            return $stmt->fetch();
        }catch (PDOException $exception){
            $categoria = new Categorias();
            $categoria->setIdCat(0);
            $categoria->setTipoCat('Todo');
            return $categoria;
        }
    }

}