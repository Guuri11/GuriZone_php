<?php
declare(strict_types=1);

namespace App\Model;

use PDO;
use App\Entity\Usuario;



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
        $stmt = $this->db->prepare('SELECT * FROM Usuario WHERE id_cli=:id');
        $stmt->bindParam(':id',$id,PDO::PARAM_INT);
        $stmt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, $this->className);
        $stmt->execute();
        return $stmt->fetch();
    }
    public function getByName(string $name):Usuario {
        $stmt = $this->db->prepare('SELECT * FROM Usuario WHERE nombre = :nombre');
        $stmt->bindParam(':nombre',$name,PDO::PARAM_STR);
        $stmt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, $this->className);
        $stmt->execute();
        return $stmt->fetch();
    }

    public function getByRol(int $rol):Usuario {
        $stmt = $this->db->prepare('SELECT * FROM Usuario WHERE rol=:rol');
        $stmt->bindParam(':rol',$rol,PDO::PARAM_INT);
        $stmt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, $this->className);
        $stmt->execute();
        return $stmt->fetch();
    }

}