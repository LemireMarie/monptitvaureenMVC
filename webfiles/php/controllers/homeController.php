<?php
namespace Controllers;

require_once('views/homeView.php');

use Views\HomeView;

class HomeController
{
    public function __construct(){
        $this->main();
    }

    private function main(){
        new HomeView();
    }
}