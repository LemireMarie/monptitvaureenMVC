<?php
require_once('../header.php');
require_once('../../actions/dbConnect.php');
?>
<h1>Formulaire de connexion :</h1>
<form action="../../actions/users/scriptConnect.php" method="POST">
<p>
    <input type="text" name="nom" id="nom" placeholder="votre prénom">
</p>
<p>
    <input type="password" name="pwd" id="pwd" placeholder="votre mot de passe">
</p>
<button type="submit">Se connecter</button>
</form>

<?php
//require_once('../footer.php');
?>