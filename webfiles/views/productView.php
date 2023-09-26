<?php

namespace views;

class ProductView 
{
    public function main(array $products): void
    {
        require_once("components/header.php");
        require_once("pages/productPage.php");
        require_once("components/footer.php");
    }

    public function form(array $products): void
    {
        require_once("components/header.php");
        require_once("components/productForm.php");
        require_once("components/footer.php");
    }
}
