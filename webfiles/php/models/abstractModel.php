<?php
namespace Models;

require_once('models/dbConnect.php');

use Error;

abstract class AbstractModel
{
    protected function dbConnect() {
        $db = new \PDO('mysql:host=localhost;dbname=monptitvaureen;charset=utf8','root','');
        if($db != false) {
            return $db;
        } else {
            throw new Error("database connection failed");
        }
    }

    public function findById($table, $id) {
        
    }

    public function findAll($table) {
        $exec = $this->dbConnect()->query("SELECT * FROM ".$table);
        return $exec->fetchAll(\PDO::FETCH_ASSOC);
    }
}