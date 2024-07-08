<?php
    session_start();
    require_once "functions.php";
    if($_SERVER['REQUEST_METHOD'] =='POST' && isset($_POST["email"], $_POST["password"])){
        try {
            // Utilisateur logué automatiquement et redirigé vers index
            selectUserInBDDAndLogUser($_POST["email"], $_POST["password"]);
        } catch (PDOException $e){
            echo "<br>Erreur lors de la connexion" . $e->getMessage();
        }
    };
    if(isset($_SESSION["email"], $_SESSION["password"])){
        redirectLoggedUserToIndex($_SESSION["email"], $_SESSION["password"]);
    }
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
    <link rel="stylesheet" href="../style.css">
</head>
<body>
    <h1>Connexion</h1>
    <form method="post" action="">
        <label for="email">Email</label>
        <input type="email" name="email" id="email"><br>
        
        <label for="password">Mot de passe</label>
        <input type="password" name="password" id="password"><br>

        <input type="submit" class="main-button" value="Envoyer">
        <a href="./inscription.php">S'inscrire</a>
    </form>

</body>
</html>
