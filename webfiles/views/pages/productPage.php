<body>
    <header>
        <div class="bg_header">
            <div class="header">
                <img src="/assets/img/logo2.jpg" alt="logo de la savonnerie">
                <nav>
                    <ul>
                        <li><a href="/" title="redirection vers la page d'accueil">Accueil</a></li>
                        <li><a href="#" title="redirection vers la page sur nos produits">Nos&nbsp;produits</a></li>
                        <li><a href="/contact" title="redirection vers la page de contact">Contact</a></li>
                    </ul>
                </nav>
            </div>
        </div>
    </header>
    <main class="produits">
    <?php 
        foreach($products as $product):
    ?>
        <div class="savon">
        <?php
            if(!empty($_SESSION) && $_SESSION["connected"] === TRUE){
        ?>
            <form action="/ajoutProduit" method="POST">
                <input type="hidden" name="id" value="<?php echo $product["id"]; ?>">
                <button type="submit">Ajouter</button>
            </form>
            <form action="/deleteProduit" method="POST">
                <input type="hidden" name="id" value="<?php echo $product["id"]; ?>">
                <button type="submit">Supprimer</button>
            </form>
            <form action="/updateProduit" method="POST">
                <input type="hidden" name="id" value="<?php echo $product["id"]; ?>">
                <button type="submit">Modifier</button>
            </form>

            <img class="imgNom" src="<?= $product["imgNom"]; ?>" alt="logo du <?= $product["nom"]; ?>">   
            <img class="img" src="<?= $product["img"]; ?>" alt="Notre savon le <?= $product["nom"]; ?>">
            <p class="prix"><?= $product["prix"]; ?> €</p>
            <p class="design"><?= $product["design"]; ?></p>
        <?php
            }
            else{    
        ?>  
            <img class="imgNom" src="<?= $product["imgNom"]; ?>" alt="logo du <?= $product["nom"]; ?>">   
            <img class="img" src="<?= $product["img"]; ?>" alt="Notre savon le <?= $product["nom"]; ?>">
            <p class="prix"><?= $product["prix"]; ?> €</p>
            <p class="design"><?= $product["design"]; ?></p>
        <?php
            }
        ?>               
        </div>
        <?php endforeach; ?> 
    </main>