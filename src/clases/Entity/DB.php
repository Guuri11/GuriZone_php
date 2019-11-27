<?php
declare(strict_types=1);

class DB extends PDO {

    private $dsn;
    private $user;
    private $password;

    public function __construct(){
        $datosJSON = file_get_contents('./config/app.json');
        $datos = json_decode($datosJSON,true);
        $this->dsn = $datos['database']['dsn'];
        $this->user = $datos['database']['user'];
        $this->password = $datos['database']['password'];
        parent::__construct($this->dsn,$this->user,$this->password,array(PDO::MYSQL_ATTR_INIT_COMMAND=>"SET NAMES utf8"));
        $this->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }


    /**
     * @return string
     */
    public function getDsn(): string
    {
        return $this->dsn;
    }

    /**
     * @param string $dsn
     */
    public function setDsn(string $dsn)
    {
        $this->dsn = $dsn;
    }

    /**
     * @return string
     */
    public function getUser(): string
    {
        return $this->user;
    }

    /**
     * @param string $user
     */
    public function setUser(string $user)
    {
        $this->user = $user;
    }

    /**
     * @return string
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    /**
     * @param string $password
     */
    public function setPassword(string $password)
    {
        $this->password = $password;
    }

}