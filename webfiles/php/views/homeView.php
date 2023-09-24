<?php

namespace Views;

class HomeView 
{
    public function __construct(){
        $this->main();
    }

    private function main(){
        require_once("components/header.php");
        require_once("pages/homePage.php");
        require_once("components/footer.php");

    }
}
