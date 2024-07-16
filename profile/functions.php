<?php 
    require_once __DIR__ . '/../bdd.php';

    // BBD Models SELECT
    function selectUserByIdInBDD(){
        global $conn;
        $sql_select_user = "SELECT id, username, email, password FROM Users;";
        $requete_select_user = $conn->prepare($sql_select_user);
        $requete_select_user->execute();
        return $requete_select_user->fetchAll(PDO::FETCH_ASSOC);
    }