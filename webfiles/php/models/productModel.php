<?php
namespace Models;

require_once('models/abstractModel.php');

use Models\AbstractModel;

class ProductModel extends AbstractModel {
    public function add($nom, $prix, $design, $imageLinks1, $imageLinks2)
    {
        $conn = $this->dbConnect();

        $req = "INSERT INTO products (nom, prix, img, design, imgNom) 
                VALUES ('$nom', '$prix', '$imageLinks1', '$design', '$imageLinks2')";

        return $conn->query($req);
    }
}