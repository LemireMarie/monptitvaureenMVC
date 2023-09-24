<?php
namespace models;

require_once('models/abstractModel.php');

use PDO;

class AdminModel extends AbstractModel {
    public function login($nom, $password): false|array
    {
        $exec = $this->dbConnect()->query("SELECT * FROM users WHERE nom = '$nom' AND pwd = '$password'");
        return $exec->fetchAll(PDO::FETCH_ASSOC);
    }
    public function signin($nom, $password): false|array
    {
        return $this->dbConnect()->query("INSERT INTO users (nom, pwd) VALUES ('$nom', '$password')");
    }


}