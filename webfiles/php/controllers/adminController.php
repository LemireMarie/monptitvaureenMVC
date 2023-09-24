<?php
namespace Controllers;

require_once('views/adminView.php');
require_once('models/adminModel.php');

use Views\AdminView;
use Models\AdminModel;

class AdminController
{

    public function loginPage(): void
    {
        $view = new AdminView();
        $view->login("");
    }

    public function login(): void
    {
        $hash = hash("md5", $_POST["pwd"]);
        $hashed = hash("sha256", $hash);

        $model = new AdminModel();
        $isLogin = $model->login($_POST["nom"], $hashed);
        if(!$isLogin){
            session_start();
            $_SESSION["connected"] = TRUE;
            header('Location: /produits');
        } else {
            $view = new AdminView();
            $view->login("Identifiants incorrects");
        }
    }

    public function signing(): void
    {
        $hash = hash("md5", $_POST["pwd"]);
        $hashed = hash("sha256", $hash);

        $model = new AdminModel();
        $isLogin = $model->signing($_POST["nom"], $hashed);
        if(!$isLogin){
            session_start();
            $_SESSION["connected"] = TRUE;
            header('Location: /produits');
        } else {
            echo "L'inscription n'a pas fonctionné";
        }
    }

}