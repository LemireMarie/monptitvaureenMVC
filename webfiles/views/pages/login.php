<?= $error ? "<p>".$error."</p>" : "" ?>

    <h1>Formulaire de connexion :</h1>
    <div class="connection">
    <form action="/connexion" method="POST">
        <p>
            <input type="text" name="nom" id="nom" placeholder="votre prénom">
        </p>
        <p>
            <input type="password" name="pwd" id="pwd" placeholder="votre mot de passe">
        </p>
        <button type="submit">Se connecter</button>
    </form>
</div>
