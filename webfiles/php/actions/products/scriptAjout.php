<?php 
    require_once('../dbConnect.php');  
    
    if(!empty($conn)){

        $nom = $_POST["nom"];
        $imgNom = $_FILES["imgNom"];
        $img = $_FILES["img"];
        $prix = $_POST["prix"];
        $design = $_POST["design"];
        //var_dump($_FILES);

        $imageLinks = [];
        $i = 0;

        foreach($_FILES as $file){
            $nom = $file["name"];
            $path = $file["tmp_name"];
            //probleme de route avec document_root
            $target_file = $_SERVER['DOCUMENT_ROOT']."/src/uploads/".$nom;
            $imageLinks[$i]=$target_file;
            echo $target_file;
            move_uploaded_file($path, $target_file);
            $i++;
        }

        $req = "INSERT INTO products (nom, prix, img, design, imgNom) 
        VALUES ('$nom', '$prix', '$imageLinks[0]', '$design', '$imageLinks[1]')";
        
        var_dump($req);

        $exec = $conn->query($req);

        if($exec != false){
            header('Location: ../../views/products/produits.php');
            echo "l'ajout a fonctionné";
        }
        else{
            echo "la requête n'a pas fonctionné";
        }
    }
    else{
        echo "Connexion à la BDD n'a pas fonctionnée";
    }
?>