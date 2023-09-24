<?php
require_once('../header.php');
require_once('../../actions/dbConnect.php');
?>
<h1>Formulaire d'inscription :</h1>
<form action="../../actions/users/scriptInscription.php" method="POST">
<p>
    <label for="nom">Votre prénom</label>
    <input type="text" name="nom" id="nom" placeholder="votre prénom">
</p>
<p>
    <label for="pwd">Votre mot de passe</label>
    <input type="pwd" name="pwd" id="pwd" placeholder="votre mot de passe">
</p>
<button type="submit">S'inscrire</button>
</form>
<?php
require_once('../footer.php');
?>