<?php
    session_start();
    require_once "functions.php";
    $id_article = $_GET["id_article"];
    $article = selectArticleByIdInBDD($id_article);

    if (($article['user_id'] != $_SESSION["id_username"])){
        header('Location: ../index.php');
    }
    if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_GET['action']) && $_GET['action'] == 'delete'){
        deleteArticleInBDD($_GET['id_article'], $_GET['id_user']);
        header('Location: ../index.php?delete=success');
    }