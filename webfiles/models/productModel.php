<?php
namespace models;

require_once('models/abstractModel.php');
use PDO;

class ProductModel extends AbstractModel {
    public function add($nom, $prix, $design, $imageLinks1, $imageLinks2): bool
    {
        $conn = $this->dbConnect();
        $prepared=$conn->prepare("INSERT INTO products (nom, prix, img, design, imgNom) 
        VALUES (:nom, :prix, :imageLinks2, :design, :imageLinks1)");

        $prepared->bindParam(':nom', $nom, PDO::PARAM_STR);
        $prepared->bindParam(':prix', $prix, PDO::PARAM_STR);
        $prepared->bindParam(':imageLinks1', $imageLinks1, PDO::PARAM_STR);
        $prepared->bindParam(':design', $design, PDO::PARAM_STR);
        $prepared->bindParam(':imageLinks2', $imageLinks2, PDO::PARAM_STR);

        return $prepared->execute();
    }
    public function update($nom, $prix, $design, $imageLinks1, $imageLinks2, $id): bool
    {
        $conn = $this->dbConnect();
        $prepared = $conn->prepare("UPDATE products 
        SET nom = :nom, imgNom = :imageLinks1, img = :imageLinks2, prix = :prix, design = :design 
        WHERE id = :id");

        $prepared->bindParam(':nom', $nom, PDO::PARAM_STR);
        $prepared->bindParam(':prix', $prix, PDO::PARAM_STR);
        $prepared->bindParam(':imageLinks1', $imageLinks1, PDO::PARAM_STR);
        $prepared->bindParam(':design', $design, PDO::PARAM_STR);
        $prepared->bindParam(':imageLinks2', $imageLinks2, PDO::PARAM_STR);
        $prepared->bindParam(':id', $id, PDO::PARAM_INT);

        return $prepared->execute();
    }
}