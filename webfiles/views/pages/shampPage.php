<body>
    <header>
        <div class="bg_header">
            <div class="header">
                <img src="/assets/img/logo2.jpg" alt="logo de la savonnerie">
                <nav>
                    <ul>
                        <li><a href="/" title="redirection vers la page d'accueil">Accueil</a></li>
                        <li><a class="products" href="#" title="redirection vers la page sur nos produits">Nos&nbsp;produits</a></li>
                        <li><a href="/contact" title="redirection vers la page de contact">Contact</a></li>
                    </ul>
                </nav>
            </div>
        </div>
    </header>
    <main>
        <?= $_SESSION && $_SESSION["connected"] ? "<a class='add' href=\"/produit/add\">Ajouter</a>" : "" ?>
        <div class="produits">
            <?php
            //$products provient de la class ProductView
            foreach ($products as $product) {
                /*require("views/components/product.php");*/
                if ($product["categorie"] === "shampoing") {
            ?>
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
                            <p class="design hide"><?= $product["design"] ?></p>
                        <?php
                        }
                        ?>
                    </div>
            <?php
                }
            } ?>
        </div>
        <div class="voile">
            <div class="modale">
                <form id="payment-form">
                    <div id="payment-element"></div>
                    <button id="submit" class="payment">
                        <div class="spinner hidden" id="spinner"></div>
                        <span id="button-text">Pay now</span>
                    </button>
                    <div id="payment-message" class="hidden"></div>
                </form>
            </div>
        </div>
    </main>