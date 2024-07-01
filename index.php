<?php
session_start();
    echo "<br>";
    if(!isset($_SESSION["username"])){
        header('Location: ./login/inscription.php');
    } else {
        echo "Accès autorisé, bonjour " . $_SESSION["username"];
        echo '<br>';
        echo '<a href="./login/deconnexion.php">Se déconnecter</a>';
    }
?>

<!-- Afficher des articles -->


