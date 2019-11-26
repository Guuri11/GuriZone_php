<?php


class Categorias
{
    private $id_cat;
    private $tipo_cat;

    /**
     * @return mixed
     */
    public function getIdCat():int
    {
        return $this->id_cat;
    }

    /**
     * @param mixed $id
     */
    public function setIdCat(int $id)
    {
        $this->id_cat = $id;
    }

    /**
     * @return mixed
     */
    public function getTipoCat():string
    {
        return $this->tipo_cat;
    }

    /**
     * @param mixed $tipo_cat
     */
    public function setTipoCat(string $tipo_cat)
    {
        $this->tipo_cat = ucfirst($tipo_cat);
    }


}