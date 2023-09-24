<?php

namespace Views;

class AdminView
{
    public function login($error): void
    {
        require_once("components/header.php");
        require_once("pages/login.php");
        require_once("components/footer.php");

    }
}