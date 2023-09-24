<?php

namespace Views;

class ProductView 
{
    public function __construct($products){
        $this->main($products);
    }

    private function main($products){
        require_once("components/header.php");
        require_once("pages/productPage.php");
        require_once("components/footer.php");
    }
}
