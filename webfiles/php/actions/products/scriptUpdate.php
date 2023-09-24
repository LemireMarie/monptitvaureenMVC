<?php
session_start();
 require_once('../dbConnect.php');
                  
    if($conn){
        $id = $_POST["id"];
        $nom = $_POST["nom"];
        $imgNom = $_FILES["imgNom"];
        $img = $_FILES["img"];
        $prix = $_POST["prix"];
        $design = $_POST["design"];

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
            var_dump($target_file);
        }

        if($_POST){

            $req = "UPDATE products SET nom = '$nom', imgNom = '$imageLinks[0]', img ='$imageLinks[1]', prix = '$prix', design = '$design' WHERE id = $id";
            $exec =$conn->query($req);
                if($exec != false){
                    header('Location: ../../views/products/produits.php');
                }
        }
    } 
    /* function update(int $id, string $nom, string $imgNom, string $img, float $prix, string $design){
        require_once('../dbConnect.php');
        if ($conn){

            $req = "UPDATE products SET nom=:prodNom, imgNom=:prodImgNom, img=:prodImg, prix=:prodPrix, design=:prodDesign: WHERE id=:prodId";
            
            $prepared = $conn->prepare($req);

            $prepared->bindParam(':prodNom', $nom, PDO::PARAM_STR, 50);
            $prepared->bindParam(':prodImgNom', $imgNom, PDO::PARAM_STR, 50);
            $prepared->bindParam(':prodImg', $img, PDO::PARAM_STR, 255);
            $prepared->bindParam(':prodPrix', $prix, PDO::PARAM_INT, 100);
            $prepared->bindParam(':prodDesign', $design, PDO::PARAM_STR, 255);
            $prepared->bindParam(':prodId', $id, PDO::PARAM_INT);
    
            $execute = $prepared->execute();

            if($execute){
                $reply = TRUE;
            }
            else{
                $reply = FALSE;
            }
        }
        return $reply;  
    } */
?>