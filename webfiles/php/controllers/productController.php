<?php
namespace Controllers;

require_once('views/productView.php');
require_once('models/productModel.php');

use Views\ProductView;
use Models\ProductModel;

class ProductController
{

    public function get(){
        $model = new ProductModel();
        $products = $model->findAll("products");

        new ProductView($products);
    }
    
}