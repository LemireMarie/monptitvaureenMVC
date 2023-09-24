<?php 

/** This function has been created for deleting products 
 * @param $id refers to the user's id
 * @return bool
 * @author Lemire Marie
 * @version 1.0
*/
//delete($_POST["id"]);
function delete(int $id){

    // Connecter à la BDD

    require_once('../dbConnect.php');

        if(!empty($conn)){

        $id = $_POST["id"];

        $req = "DELETE FROM products WHERE id=:productID";

        //Préparation de la requête :
        $preparedDeleteQuery = $conn->prepare($req);
        $preparedDeleteQuery -> bindParam(':productID', $id, PDO::PARAM_INT, 50);

        //$exec = $conn->query($req);
        $exec = $preparedDeleteQuery->execute();

            if($exec != false){
                header('Location: ../../views/products/produits.php');
                echo "Suppression effectuée";
            }
            else{
                echo  "Requête invalide";
            }
        }
}
?>
