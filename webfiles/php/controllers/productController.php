<?php
namespace Controllers;

require_once('views/productView.php');
require_once('models/productModel.php');

use Views\ProductView;
use Models\ProductModel;

class ProductController
{
    public function get(): void
    {
        $model = new ProductModel();
        $products = $model->findAll("products");

        new ProductView($products);
    }

    public function add(): void
    {
        $imageLinks = [];
        $i = 0;

        foreach ($_FILES as $file) {
            $nom = $file["name"];
            $path = $file["tmp_name"];
            $target_file = "assets/src/uploads/" . $nom;
            $imageLinks[$i] = $target_file;
            move_uploaded_file($path, "../" . $target_file);
            $i++;
        }

        $model = new ProductModel();
        $model->add($_POST["nom"], $_POST["prix"], $_POST["design"], $imageLinks[0], $imageLinks[1]);

        header('Location: /produits');
    }

}