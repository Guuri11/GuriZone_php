<?php
declare(strict_types=1);

namespace  App;

use PDO;

class DB {

    private $dsn;
    private $user;
    private $password;
    private $connection;

    public function __construct(){
        $datosJSON = file_get_contents('../config/app.json');
        $datos = json_decode($datosJSON,true);
        $this->dsn = $datos['database']['dsn'];
        $this->user = $datos['database']['user'];
        $this->password = $datos['database']['password'];
        $this->connection = new PDO($this->dsn,$this->user,$this->password,array(PDO::MYSQL_ATTR_INIT_COMMAND=>"SET NAMES utf8"));
        $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $this->connection->setAttribute(PDO::ATTR_EMULATE_PREPARES,false);
    }

    /**
     * @return PDO
     */
    public function getConnection():PDO
    {
        return $this->connection;
    }

}