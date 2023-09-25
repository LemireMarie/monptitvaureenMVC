<?php
$request_url = filter_var($_SERVER['REQUEST_URI'], FILTER_SANITIZE_URL);
$request_url = rtrim($request_url, '/');
$request_url_parts = explode('/', $request_url);
array_shift($request_url_parts);
$url = join("/", $request_url_parts);
if($_SESSION && $_SESSION["connected"]){ 
?>
    <h1>Formulaire d'ajout de produits</h1>
    <form action="/<?= $url ?>" method="POST" enctype="multipart/form-data">
        <input type="text" name="nom" placeholder="Le nom du produit">
        <input type="file" name="imgNom" id="imgNom" placeholder="La photo du nom du produit">
        <input type="file" name="img" placeholder="L'image du produit">
        <input type="number" step="0.01" name="prix" placeholder="19.99">
        <textarea name="design" name="design" id="design" cols="30" rows="20"></textarea>
        <button type="submit">Envoyer le produit</button>
    </form>
</body>
<?php
}
else{
    header('Location: /produits');
}