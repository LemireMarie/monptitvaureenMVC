<?php
namespace Controllers;

require_once('views/productView.php');
require_once('models/productModel.php');

use Views\ProductView;
use Models\ProductModel;

class ProductController extends CommonService
{
    public function get(): void
    {
        $model = new ProductModel();
        $products = $model->findAll("products");
        new ProductView($products);
    }

    public function add(): void
    {
        $imageLinks = $this->processFiles();
        $model = new ProductModel();
        $model->add($_POST["nom"], $_POST["prix"], $_POST["design"], $imageLinks[0], $imageLinks[1]);
        header('Location: /produits');
    }

    public function update(): void
    {
        $imageLinks = $this->processFiles();
        $model = new ProductModel();
        $model->update($_POST["nom"], $_POST["prix"], $_POST["design"], $imageLinks[0], $imageLinks[1], $_POST["id"]);
        header('Location: /produits');
    }

    public function delete(): void
    {
        $model = new ProductModel();
        $model->deleteById("products", $_POST["id"]);
        header('Location: /produits');
    }

}