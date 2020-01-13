<?php


namespace App\Entity;


class Roles
{
    private $id_rol;
    private $tipo_rol;

    /**
     * @return mixed
     */
    public function getIdRol()
    {
        return $this->id_rol;
    }

    /**
     * @param mixed $id_rol
     */
    public function setIdRol($id_rol): void
    {
        $this->id_rol = $id_rol;
    }

    /**
     * @return mixed
     */
    public function getTipoRol()
    {
        return $this->tipo_rol;
    }

    /**
     * @param mixed $tipo_rol
     */
    public function setTipoRol($tipo_rol): void
    {
        $this->tipo_rol = $tipo_rol;
    }


}