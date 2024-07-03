<?php
require_once "../bdd.php";

// BDD
function createUserInBDD($username, $email, $password) {
    global $conn;
    $sql_insert_utilisateur = "INSERT INTO Users(username, email, password) VALUES (:username, :email, :password);";
    $requete_insert_utilisateur = $conn->prepare($sql_insert_utilisateur);
    $requete_insert_utilisateur->execute(
        array(
            ":username" => $_POST['username'],
            ":email" => $_POST['email'],
            ":password" => $_POST['password']
        )
    );
};
function selectUserInBDDAndLogUser($email, $password){
    global $conn;
    $sql_select_utilisateur = "SELECT username, email, password FROM Users WHERE email lIKE :email AND password LIKE :password;";
    $requete_select_utilisateur = $conn->prepare($sql_select_utilisateur);
    $requete_select_utilisateur->execute(
        array(
            ":email" => $_POST["email"],
            ":password" => $_POST["password"]
        )
    );
    $resultat = $requete_select_utilisateur->fetch();
    if($resultat != false){
        $_SESSION["username"] = $resultat["username"];
        $_SESSION["email"] = $resultat["email"];
        $_SESSION["password"] = $resultat["password"];

        header("Location:../index.php");
    }
}