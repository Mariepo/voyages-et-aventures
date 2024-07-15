<?php
    session_start();
    require_once "functions.php";

    $id_comment = $_GET['comment_id'];
    $id_article = $_GET["id_article"];
    $comment = selectCommentByIDD($id_comment);

    if(isset($_GET['action']) && $_GET['action'] == 'delete_comment' && isset($id_article) && isset($id_comment) && $_SESSION["id_username"] == $comment['user_id']) {
        deleteCommentInBDD($id_comment, $_SESSION["id_username"], $id_article);
        header('Location: ./details_article.php?id_article=' . $id_article);
        exit();
    } else {
        header('Location: ../index.php?delete_comment=error');
        exit();
    }
