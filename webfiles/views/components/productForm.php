<?php
//sert à récupérer l'url
$request_url = filter_var($_SERVER['REQUEST_URI'], FILTER_SANITIZE_URL);
$request_url = rtrim($request_url, '/');
$request_url_parts = explode('/', $request_url);
array_shift($request_url_parts);
$url = join("/", $request_url_parts);
if($_SESSION && $_SESSION["connected"]){ 
?>
    <h1>Formulaire d'ajout ou de modification de produits</h1>
    <form action="/<?= $url ?>" method="POST" enctype="multipart/form-data">
        <label for="nom">Nom du produit</label>
        <input type="text" value="<?= $products ? $products['nom'] : "" ?>" name="nom" id="nom" placeholder="Le nom du produit">
        <label for="imgNom">Image du nom du produit</label>
        <input type="file" value="<?= $products ? $products['imgNom'] : "" ?>" name="imgNom" id="imgNom" placeholder="La photo du nom du produit">
        <label for="img">Photo du produit</label>
        <input type="file" value="<?= $products ? $products['img'] : "" ?>" name="img" id="img" placeholder="L'image du produit">
        <label for="prix">Prix</label>
        <input type="number" value="<?= $products ? $products['prix'] : "" ?>" step="0.01" name="prix" id="prix" placeholder="19.99">
        <label for="design">Description du produit</label>
        <textarea name="design" name="design" id="design" cols="30" rows="20"><?= $products ? $products['design'] : "" ?></textarea>
        <label for="categorie">Type de produit</label>
        <input type="text" value="<?= $products ? $products['categorie'] : "" ?>" name="categorie" id="categorie">
        <button type="submit">Envoyer le produit</button>
    </form>
</body>
<?php
}
else{
    header('Location: /produits');
}