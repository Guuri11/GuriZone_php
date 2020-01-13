<?php
declare(strict_types=1);

namespace App\Model;

use App\Entity\Usuario;
use PDO;
use App\Entity\Roles;
use PDOException;


class RolesModel
{
    private $db;
    protected $className = 'App\Entity\Roles';

    /**
     * @param $db
     */
    function __construct(PDO $db){
        $this->db = $db;
    }
    public function getById(int $id):Usuario{
        try {
            $stmt = $this->db->prepare('SELECT * FROM Roles WHERE id_rol=:id');
            $stmt->bindParam(':id',$id,PDO::PARAM_INT);
            $stmt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, $this->className);
            $stmt->execute();
            return $stmt->fetch();
        }catch (\PDOException $exception){
            echo $exception->getMessage();
        }
    }
    public function getByTipoRol(string $tipo_rol):Roles {
        try {
            var_dump($tipo_rol);
            $stmt = $this->db->prepare('SELECT * FROM Roles WHERE tipo_rol=:tipo_rol');
            $stmt->bindParam(':tipo_rol',$tipo_rol,PDO::PARAM_STR);
            $stmt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, $this->className);
            $stmt->execute();
            return $stmt->fetch();
        }catch (\PDOException $exception){
            echo $exception->getMessage();
        }
    }
}