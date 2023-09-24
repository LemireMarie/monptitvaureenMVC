<?php
session_start();
var_dump($_SESSION);
if(!empty($_SESSION) && $_SESSION["connected"] === TRUE){
    echo "Vous êtes connecté à votre session";
}
else{
    echo "Connectez-vous";
}
?>