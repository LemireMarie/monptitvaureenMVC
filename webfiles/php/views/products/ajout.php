<?php
session_start();
require_once('../header.php');
if(!empty($_SESSION) && $_SESSION["connected"]){ 
?>
        <h1>Formulaire d'ajout de produits</h1>
        <form action="/produits/add" method="POST" enctype="multipart/form-data">
            <input type="text" name="nom" placeholder="Le nom du produit">
            <input type="file" name="imgNom" id="imgNom" placeholder="La photo du nom du produit">
            <input type="file" name="img" placeholder="L'image du produit">
            <input type="number" step="0.01" name="prix" placeholder="19.99">
            <textarea name="design" name="design" id="design" cols="30" rows="20"></textarea>
            <button type="submit">Ajouter le produit</button>
        </form>
    </body>
    <?php
}
else{
    header('Location: ./produits.php');
}
require_once('../footer.php');
?>
