<?php

session_start();

require_once('router.php');
require_once('controllers/homeController.php');
require_once('controllers/productController.php');
require_once('controllers/AdminController.php');

use controllers\AdminController;
use controllers\HomeController;
use controllers\ProductController;

get('/deconnexion', function(){
    session_destroy();
    header('Location: /produits');
});

get('/', function(){
    new HomeController();
});

get('/produits', function(){
    $controller = new ProductController();
    $controller->get();
});

post('/produit/add', function(){
    $controller = new ProductController();
    $controller->add();
});

post('/produit/update/$id', function($id){
    $controller = new ProductController();
    $controller->update($id);
});


get('/produit/add', function(){
    $controller = new ProductController();
    $controller->addPage();
});

get('/produit/update/$id', function($id){
    $controller = new ProductController();
    $controller->updatePage($id);
});

get('/produit/delete/$id', function($id){
    $controller = new ProductController();
    $controller->delete($id);
});

get('/connexion', function(){
    $controller = new AdminController();
    $controller->loginPage();
});

post('/connexion', function(){
    $controller = new AdminController();
    $controller->login();
});

post('/inscription', function(){
    $controller = new AdminController();
    $controller->signin();
});