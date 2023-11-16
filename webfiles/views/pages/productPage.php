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
                    require("views/components/product.php");
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