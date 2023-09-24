<?php
namespace models;

require_once('models/abstractModel.php');

class ProductModel extends AbstractModel {
    public function add($nom, $prix, $design, $imageLinks1, $imageLinks2): false|\PDOStatement
    {
        $conn = $this->dbConnect();

        $req = "INSERT INTO products (nom, prix, img, design, imgNom) 
                VALUES ('$nom', '$prix', '$imageLinks1', '$design', '$imageLinks2')";

        return $conn->query($req);
    }
    public function update($nom, $prix, $design, $imageLinks1, $imageLinks2, $id): false|\PDOStatement
    {
        $conn = $this->dbConnect();
        $req = "UPDATE products 
                SET nom = '$nom', imgNom = '$imageLinks1', img ='$imageLinks2', prix = '$prix', design = '$design' 
                WHERE id = $id";
        return $conn->query($req);
    }
}