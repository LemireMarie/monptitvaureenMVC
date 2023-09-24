<?php 
session_start();
require_once("../header.php");?>
<body>
    <header>
        <div class="bg_header">
            <div class="header">
                <img src="../../../../src/img/logo2.jpg" alt="logo de la savonnerie">
                <nav>
                    <ul>
                        <li><a href="./index.php" title="redirection vers la page d'accueil">Accueil</a></li>
                        <li><a href="./produits.php" title="redirection vers la page sur nos produits">Nos&nbsp;produits</a></li>
                        <li><a href="#" title="redirection vers la page de contact">Contact</a></li>
                    </ul>
                </nav>
            </div>
        </div>
    </header>
    <main>
       <div class="contact">
           <div class="liste">
            <h2>Liste de nos points de vente : </h2>
            <ul>
                <li>Lorem ipsum, dolor sit amet consectetur adipisicing elit.</li>
                <li>Lorem ipsum dolor sit amet consectetur adipisicing elit.</li>
                <li>Lorem ipsum dolor sit amet consectetur adipisicing elit.</li>
            </ul>
            <h2>Nos ateliers</h2>
            <ul>
                <li>Lorem ipsum dolor sit amet consectetur adipisicing elit.</li>
                <li>Lorem ipsum dolor sit amet consectetur adipisicing elit.</li>
                <li>Lorem ipsum dolor sit amet consectetur adipisicing elit.</li>
            </ul>
           </div>
           <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2884.6312105826582!2d1.815955376697764!3d43.697429849568344!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x12ae874c5f886995%3A0x8ce79d082fba3e10!2s5%20Rue%20du%20Pas%2C%2081500%20Lavaur!5e0!3m2!1sfr!2sfr!4v1683731426612!5m2!1sfr!2sfr" width="600" height="450" style="border:2;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
       </div>
    </main>
<?php require("../footer.php"); ?>

