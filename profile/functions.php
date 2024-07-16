<?php 
    require_once __DIR__ . '/../bdd.php';

    // BBD Models SELECT
    function selectUserByIdInBDD($id_user){
        global $conn;
        $sql_select_user_by_id = "SELECT id, username, email, password FROM Users WHERE id = ?;";
        $requete_select_user_by_id = $conn->prepare($sql_select_user_by_id);
        $requete_select_user_by_id->execute([$id_user]);
        return $requete_select_user_by_id->fetch(PDO::FETCH_ASSOC);
    }

    // BBD Models UPDATE
    function editUserInBdd($username, $email, $password, $id_user){
        global $conn;
        $sql_update_user = "UPDATE Users SET username = ?, email = ?, password = ? WHERE id = ?";
        $requete_update_user = $conn->prepare($sql_update_user);
        $requete_update_user->execute([$username, $email, $password, $id_user]);
        header('Location:?edit_user=success');
    }



