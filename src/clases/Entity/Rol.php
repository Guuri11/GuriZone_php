<?php
declare(strict_types=1);

namespace App\Entity;


class Rol{

    private $rol;
    private $tipoRol;

    /**
     * @param int $rol
     */
    public function __construct(int $rol){
        $this->rol = $rol;
        $this->setTipoRol($this->rol);
    }

    /**
     * @return mixed
     */
    public function getRol(): int
    {
        return $this->rol;
    }

    /**
     * @param mixed $rol
     */
    public function setRol(int $rol)
    {
        $this->rol = $rol;
    }

    /**
     * @return mixed
     */
    public function getTipoRol():string
    {
        return $this->tipoRol;
    }

    /**
     * @param mixed $tipoRol
     */
    public function setTipoRol(int $idRol)
    {
        switch ($idRol){
            case 1:
                $this->tipoRol = "anonimo";
                break;
            case 2:
                $this->tipoRol = "admin";
                break;
            case 3:
                $this->tipoRol = "usuario";
                break;
            default:
        }
    }


}