<?php

namespace views;

class ContactView 
{
    public function __construct(){
        $this->main();
    }

    private function main(): void
    {
        require_once("components/header.php");
        require_once("pages/contactPage.php");
        require_once("components/footer.php");

    }
}