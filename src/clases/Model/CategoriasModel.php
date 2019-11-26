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
    public function getById(int $id):Usuario{
        $stmt = $this->db->prepare('SELECT * FROM Usuario WHERE id_cli=:id');
        $stmt->bindParam(':id',$id,PDO::PARAM_INT);
        $stmt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Usuario');
        $stmt->execute();
        return $stmt->fetch();
    }
    public function getByName(string $name):Usuario {
        $stmt = $this->db->prepare('SELECT * FROM Usuario WHERE nombre = :nombre');
        $stmt->bindParam(':nombre',$name,PDO::PARAM_STR);
        $stmt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Usuario');
        $stmt->execute();
        return $stmt->fetch();
    }

    public function getByRol(int $rol):Usuario {
        $stmt = $this->db->prepare('SELECT * FROM Usuario WHERE rol=:rol');
        $stmt->bindParam(':rol',$rol,PDO::PARAM_INT);
        $stmt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Usuario');
        $stmt->execute();
        return $stmt->fetch();
    }

}