<?php
namespace controllers;

require_once('./views/productView.php');
require_once('./models/productModel.php');
require_once('./controllers/commonService.php');

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

    public function getCategorie($table, $categorie)
    {
        $model = new ProductModel();
        $products = $model->findByCategorie($table, $categorie);

        $view = new ProductView();
        $view->main($products);
    }

    public function add(): void
    {
        $imageLinks = $this->processFiles();
        $model = new ProductModel();
        $model->add($_POST["nom"], $_POST["prix"], $_POST["design"], $imageLinks[0], $imageLinks[1], $_POST["categorie"]);
        header('Location: /produits');
    }

    public function update($id): void
    {
        $imageLinks = $this->processFiles();
        $imageNomLink = $imageLinks[0];
        $imageLink = $imageLinks[1];
        
        $model = new ProductModel();

        $model->findById("products", $id);
        $product = $model->findById("products", $id);
        if($imageNomLink == "/assets/uploads/"){
            $imageNomLink = $product["imgNom"];
        }
        if($imageLink == "/assets/uploads/"){
            $imageLink = $product["img"];
        }


        $model->update($_POST["nom"], $_POST["prix"], $_POST["design"], $imageNomLink, $imageLink, $_POST["categorie"], $id);
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
        $view->form([]);
    }

    public function updatePage($id): void
    {
        $model = new ProductModel();
        $product = $model->findById("products", $id);
        $view = new ProductView();
        $view->form($product);
    }

   

}