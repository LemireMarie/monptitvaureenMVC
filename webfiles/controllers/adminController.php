<?php
namespace controllers;

require_once('views/adminView.php');
require_once('models/adminModel.php');

use models\AdminModel;
use views\AdminView;

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

    public function signin(): void
    {
        $hash = hash("md5", $_POST["pwd"]);
        $hashed = hash("sha256", $hash);

        $model = new AdminModel();
        $isLogin = $model->signin($_POST["nom"], $hashed);
        if(!$isLogin){
            session_start();
            $_SESSION["connected"] = TRUE;
            header('Location: /produits');
        } else {
            echo "L'inscription n'a pas fonctionné";
        }
    }

}