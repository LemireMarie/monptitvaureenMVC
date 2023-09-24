<?php
namespace Controllers;

require_once('views/adminView.php');
require_once('models/adminModel.php');

use Views\AdminView;
use Models\AdminModel;

class AdminController
{

    public function get(){
        new AdminView();
    }

    public function connection(){

    }
    
}