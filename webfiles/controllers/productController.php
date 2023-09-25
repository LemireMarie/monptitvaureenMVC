<?php
namespace controllers;

require_once('views/productView.php');
require_once('models/productModel.php');
require_once('controllers/commonService.php');

use models\ProductModel;
use views\ProductView;
use controllers\CommonService;

class ProductController extends CommonService
{
    public function get(): void
    {
        $model = new ProductModel();
        $products = $model->findAll("products");
        $view = new ProductView();
        $view->main($products);
    }

    public function add(): void
    {
        $imageLinks = $this->processFiles();
        $model = new ProductModel();
        $model->add($_POST["nom"], $_POST["prix"], $_POST["design"], $imageLinks[0], $imageLinks[1]);
        header('Location: /produits');
    }

    public function update($id): void
    {
        $imageLinks = $this->processFiles();
        $model = new ProductModel();
        $model->update($_POST["nom"], $_POST["prix"], $_POST["design"], $imageLinks[0], $imageLinks[1], $id);
        header('Location: /produits');
    }

    public function delete($id): void
    {
        $model = new ProductModel();
        $model->deleteById("products", $id);
        header('Location: /produits');
    }

    public function addPage(): void
    {
        $view = new ProductView();
        $view->form();
    }

    public function updatePage(): void
    {
        $view = new ProductView();
        $view->form();
    }

}