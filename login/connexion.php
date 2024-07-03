<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
</head>
<body>
    <form method="post" action="">
        <label for="email">Email</label>
        <input type="email" name="email" id="email"><br>
        
        <label for="password">Mot de passe</label>
        <input type="password" name="password" id="password"><br>

        <input type="submit" value="Envoyer">
    </form>

    <a href="./inscription.php">S'inscrire</a>
</body>
</html>

<?php
require_once "functions.php";
if(isset($_POST["email"], $_POST["password"])){
    try {
        // Utilisateur logué automatiquement et redirigé vers index
        selectUserInBDDAndLogUser($_POST["email"], $_POST["password"]);
    } catch (PDOException $e){
        echo "<br>Erreur lors de la connexion" . $e->getMessage();
    }
} 
?>