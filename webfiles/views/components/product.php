<div class="savon" id="<?= $product["id"] ?>">
<?php
    if ($_SESSION && $_SESSION["connected"]) {
?>
    <a href="/produit/update/<?= $product["id"] ?>">Modifier</a>
    <a href="/produit/delete/<?= $product["id"] ?>">Supprimer</a>
    <img class="imgNom" loading="lazy" src="<?= $product["imgNom"] ?>" alt="logo du <?= $product["nom"] ?>">
    <img class="img" loading="lazy" src="<?= $product["img"] ?>" alt="Notre savon le <?= $product["nom"] ?>">
    <button class="infos">+ d'infos</button>
    <p class="prix"><?= $product["prix"] ?> € les&nbsp100gr</p>
    <p class="design hide"><?= $product["design"] ?></p>
<?php
} else {
?>
    <img class="imgNom" loading="lazy" src="<?= $product["imgNom"] ?>" alt="logo du <?= $product["nom"] ?>">
    <img class="img" loading="lazy" src="<?= $product["img"] ?>" alt="Notre savon le <?= $product["nom"] ?>">
    <button class="infos">+ d'infos</button>
    <p class="prix"><?= $product["prix"] ?> € les&nbsp100gr</p>
    <input type="number" name="quantity" id="quantity" placeholder="Quantité">
    <p class="design hide"><?= $product["design"] ?></p>
<?php
}
?>
</div>