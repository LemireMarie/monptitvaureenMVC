<?php
namespace models;

use Error;
use PDO;

abstract class AbstractModel
{
    protected function dbConnect(): PDO
    {
        $db = new PDO('mysql:host=localhost;dbname=monptitvaureen;charset=utf8','root','');
        if($db) {
            return $db;
        } else {
            throw new Error("database connection failed");
        }
    }

    public function findAll($table): false|array
    {
        $exec = $this->dbConnect()->query("SELECT * FROM ".$table);
        return $exec->fetchAll(PDO::FETCH_ASSOC);
    }

    public function deleteById($table, $id): bool
    {
        $preparedDeleteQuery = $this->dbConnect()->prepare("DELETE FROM ".$table." WHERE id=:productID");
        $preparedDeleteQuery -> bindParam(':productID', $id, PDO::PARAM_INT, 50);
        return $preparedDeleteQuery->execute();
    }

    public function findById($table, $id): false|array
    {
        $exec = $this->dbConnect()->query("SELECT * FROM ".$table."WHERE id=".$id);
        return $exec->fetchAll(PDO::FETCH_ASSOC);
    }

}