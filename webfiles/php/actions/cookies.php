<?php
setcookie("cookie", "autorised", time()+2592000, "/");
header('Location: ../views/products/produits.php');
?>