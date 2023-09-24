<?php
session_start();
require_once('../header.php');
require_once('../../actions/dbConnect.php');

if(!empty($_SESSION) && $_SESSION["connected"]){ 
    if($conn){
        if($_POST){
            $id = $_POST['id'];
            $req = "SELECT * FROM products WHERE id = $id";
            $exec =$conn->query($req);
                if($exec != false){
                    $result = $exec->fetchAll(PDO::FETCH_ASSOC);
                }
        }
    }
    var_dump($result);

    ?>
    <form action="../../actions/products/scriptUpdate.php" method="POST">
        <p><input type="text" name="nom" value= "<?=$result[0]["nom"];?>" placeholder="nom"></p>
        <p><input type="file" name="imgNom" value= "<?=$result[0]["imgNom"];?>" placeholder="La photo du nom du produit"></p>
        <p><input type="file" name="img" value= "<?=$result[0]["img"];?>" placeholder="photo du produit"></p>
        <p><input type="number" step="0.01" name="prix" value= "<?=$result[0]["prix"];?>" placeholder="Prix du produit"></p>
        <p><textarea name="design" name="design" value= "<?=$result[0]["design"];?>" cols="30" rows="20"></textarea></p>
        <p><input type="hidden" name="id" value="<?= $result[0]["id"];?> "></p>
        <button type="submit">Modifier</button>
    </form>
    <?php
}
else{
    header('Location: ../../views/products/produits.php');
}    
    require_once('../footer.php');
    ?>