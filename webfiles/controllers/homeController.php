<?php
namespace controllers;

require_once('views/homeView.php');

use views\HomeView;

class HomeController
{
    public function __construct(){
        $this->main();
    }

    private function main(){
        new HomeView();
    }
}