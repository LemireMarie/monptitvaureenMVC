<footer>
        <div class="footer">
            <nav>      
                <div id="buttons">
                    <?php if (!$_SESSION || !$_SESSION["connected"]){ ?>
                        <p><a href="/connexion">Connexion</a></p>
                        <!-- <p><a href="/inscription">Inscription</a></p> -->
                    <?php } else { ?>
                        <p><a href="/deconnexion">Déconnexion</a></p>
                    <?php } ?>
                    <p><a href="#">Mentions légales</a></p>        
                    <p><a href="#">Partenaires</a></p>
                </div>
            </nav>
        </div>
    </footer>
</body>
</html>