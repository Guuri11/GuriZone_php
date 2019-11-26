<?php
declare(strict_types=1);

class Usuario
{
    private $id_cli;
    private $rol;
    private $nombre;
    private $apellidos;
    private $email;
    private $password;
    private $foto_perfil;

    /**
     * @return mixed
     */
    public function getIdCli():int
    {
        return $this->id_cli;
    }

    /**
     * @param mixed $id_cli
     */
    public function setIdCli(int $id_cli)
    {
        $this->id_cli = $id_cli;
    }

    /**
     * @return mixed
     */
    public function getRol():int
    {
        return intval($this->rol);
    }
    public function getTipoRol():string{
        switch ($this->getRol()){
            case 1:
                return "anonimo";
                break;
            case 2:
                return "admin";
                break;
            case 3:
                return "usuario";
                break;
            default:
                return "anonimo";
        }
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
    public function getNombre():string
    {
        return $this->nombre;
    }

    /**
     * @param mixed $nombre
     */
    public function setNombre(string $nombre)
    {
        $this->nombre = $nombre;
    }

    /**
     * @return mixed
     */
    public function getApellidos():string
    {
        return $this->apellidos;
    }

    /**
     * @param mixed $apellidos
     */
    public function setApellidos(string $apellidos)
    {
        $this->apellidos = $apellidos;
    }

    /**
     * @return mixed
     */
    public function getEmail():string
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail(string $email)
    {
        $this->email = $email;
    }

    /**
     * @return mixed
     */
    public function getPassword():string
    {
        return $this->password;
    }

    /**
     * @param mixed $password
     */
    public function setPassword(string $password)
    {
        $this->password = $password;
    }

    /**
     * @return mixed
     */
    public function getFotoPerfil():string
    {
        return $this->foto_perfil;
    }

    /**
     * @param mixed $foto_perfil
     */
    public function setFotoPerfil(string $foto_perfil)
    {
        $this->foto_perfil = $foto_perfil;
    }



}