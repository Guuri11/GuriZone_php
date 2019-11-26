<?php
/**
 * @return DB
 * Crea un objeto DB que servira para toda la ddbb
 */
function conexionDB(){
    try{
        $db = new DB();
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $db;
    }catch (PDOException $e){
        echo $e->getMessage();
    }
}