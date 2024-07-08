<?php
    session_start();
    require_once "functions.php";
    if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST["username"], $_POST["email"], $_POST["password"])){
        try {
            // Création de l'utilisateur
            createUserInBDD($_POST["username"], $_POST["email"], $_POST["password"]); 
            // Utilisateur logué automatiquement et redirigé vers index
            selectUserInBDDAndLogUser($_POST["email"], $_POST["password"]);
        } catch (PDOException $e){
            echo "<br>Erreur lors de l'inscription" . $e->getMessage();
        }
    } 
    redirectLoggedUserToIndex($_SESSION["email"], $_SESSION["password"]);
?>
<!DOCTYPE html>
<head>
    <title>Inscription</title>
</head>
<body>
    <h1>Formulaire d'inscription</h1>
    <form method="POST" action="">
        <label for="username">Nom d'utilisateur</label>
        <input type="text" name="username" id="username" required><br>

        <label for="email">Email</label>
        <input type="email" name="email" id="email" required><br>
        
        <label for="password">Mot de passe</label>
        <input type="password" name="password" id="password" required><br>

        <input type="submit" value="Envoyer">
    </form>
    <a href="./connexion.php">Connexion</a>
</body>


