<?php 
    require_once('../dbConnect.php');
    require_once('./function.php');

    if(empty($_POST)){ ?>
        <p><?="Le formulaire d'inscription n'a pas été envoyé"; ?></p>
<?php  }
    else{
        $nom = $_POST["nom"];
        $pwd = $_POST["pwd"];
        $hash = hash("md5", $pwd);
        $hashed = hash("sha256", $hash);
        $req = "INSERT INTO users (nom, pwd) VALUES ('$nom', '$hashed')";
        $exec = $conn->query($req);
        
        if($exec != false){
            header('Location: ../../views/products/produits.php');
            echo "L'inscription a fonctionné";
        }
        else{
            echo "L'inscription n'a pas fonctionné";
        }
    }   
?>
    
   