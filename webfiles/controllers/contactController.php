<?php
namespace controllers;

require_once('./views/contactView.php');

use views\ContactView;

class ContactController
{
    public function get(){
        new ContactView();
    }
}