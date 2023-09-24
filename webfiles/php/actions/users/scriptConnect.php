<?php 
    require_once('../dbConnect.php');

    if (!empty($conn)){
        echo "connecté à la base de données";
        //if (!empty($_post) && !empty($_POST["email"] && !empty($_POST["password"])))
        if(!empty($conn)){
    
            $nom = $_POST["nom"];
            $password = $_POST["pwd"];
            $hash = hash("md5", $password);
            $hashed = hash("sha256", $hash);
            $requete = "SELECT * FROM users WHERE nom = '$nom' AND pwd = '$hashed'";       
            $exec = $conn->query($requete);
            if($exec != false){
                $result = $exec->fetchAll(PDO::FETCH_ASSOC);
            }
            //var_dump($result);
            if(!empty($result)){
                session_start();
                $_SESSION["connected"] = TRUE;
                
                header('Location: ../../views/products/produits.php');
                
            }
            else{
                echo "Identifiants incorrects";
            }
          require_once('./function.php'); 
        }
          
    }
    else{
        echo "Vous n'êtes pas connecté";
    }
    ?>