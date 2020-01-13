<?php
declare(strict_types=1);

namespace App\Entity;

use App\Model\ProductoModel;
use App\Model\UsuarioModel;

/**
 * Class Paginacion
 */
class Paginacion_usuarios
{
    private $num_usuarios;
    private $usuarios_pagina;
    private $num_paginas;
    private $pagina;
    private $usuario_inicial;
    private $usuario_final;
    private $usuarios;
    private $rol;

    public function __construct(int $num_usuarios, int $usuarios_pagina,int $pagina,UsuarioModel $usuarioConsulta, int $rol)
    {
        $this->num_usuarios = $num_usuarios;
        $this->usuarios_pagina = $usuarios_pagina;
        $this->num_paginas = ceil($this->num_usuarios/$this->usuarios_pagina);
        $this->pagina = $pagina;
        $this->usuario_inicial = intval(($this->pagina-1)*$this->usuarios_pagina);
        $this->usuario_final= intval($this->usuario_inicial+$this->usuario_pagina);
        $this->rol = $rol
        $this->usuarios = $usuarioConsulta->getUsuariosGestion($this->usuario_inicial,$this->usuarios_pagina,$this->rol);
    }
    
    /**
     * @return int
     */
    public function getNumUsuarios(): int
    {
        return $this->num_usuarios;
    }

    /**
     * @param int $num_usuarios
     */
    public function setNumUsuarios(int $num_usuarios): void
    {
        $this->num_usuarios = $num_usuarios;
    }

    /**
     * @return int
     */
    public function getUsuariosPagina(): int
    {
        return $this->usuarios_pagina;
    }

    /**
     * @param int $usuarios_pagina
     */
    public function setUsuariosPagina(int $usuarios_pagina): void
    {
        $this->usuarios_pagina = $usuarios_pagina;
    }

    /**
     * @return false|float
     */
    public function getNumPaginas()
    {
        return $this->num_paginas;
    }

    /**
     * @param false|float $num_paginas
     */
    public function setNumPaginas($num_paginas): void
    {
        $this->num_paginas = $num_paginas;
    }

    /**
     * @return int
     */
    public function getPagina(): int
    {
        return $this->pagina;
    }

    /**
     * @param int $pagina
     */
    public function setPagina(int $pagina): void
    {
        $this->pagina = $pagina;
    }

    /**
     * @return int
     */
    public function getUsuarioInicial(): int
    {
        return $this->usuario_inicial;
    }

    /**
     * @param int $usuario_inicial
     */
    public function setUsuarioInicial(int $usuario_inicial): void
    {
        $this->usuario_inicial = $usuario_inicial;
    }

    /**
     * @return int
     */
    public function getUsuarioFinal(): int
    {
        return $this->usuario_final;
    }

    /**
     * @param int $usuario_final
     */
    public function setUsuarioFinal(int $usuario_final): void
    {
        $this->usuario_final = $usuario_final;
    }

    /**
     * @return mixed
     */
    public function getUsuarios()
    {
        return $this->usuarios;
    }

    /**
     * @param mixed $usuarios
     */
    public function setUsuarios($usuarios): void
    {
        $this->usuarios = $usuarios;
    }

    /**
     * @return int
     */
    public function getRol(): int
    {
        return $this->rol;
    }

    /**
     * @param int $rol
     */
    public function setRol(int $rol): void
    {
        $this->rol = $rol;
    }

}