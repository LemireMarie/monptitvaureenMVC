<?php
require_once('router.php');
require_once('controllers/homeController.php');
require_once('controllers/productController.php');
require_once('controllers/AdminController.php');

use Controllers\HomeController;
use Controllers\ProductController;
use Controllers\AdminController;

get('/deconnection', function(){
    session_destroy();
    header('Location: /');
});

get('/', function(){
    new HomeController();
});

get('/produits', function(){
    $controller = new ProductController();
    $controller->get();
});

post("/produits/add", function(){
    $controller = new ProductController();
    $controller->add();
});

post("/produits/update", function(){
    $controller = new ProductController();
    $controller->update();
});

post("/produits/delete", function(){
    $controller = new ProductController();
    $controller->delete();
});

get('/connexion', function(){
    $controller = new AdminController();
    $controller->get();
});

post('/connexion', function(){
    $controller = new AdminController();
    $controller->connection();
});

?>