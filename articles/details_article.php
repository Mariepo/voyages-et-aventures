<?php 
    session_start();
    require_once "functions.php";
    $id_article = $_GET["id_article"];
    $article = selectArticleByIdInBDD($id_article);
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Article</title>
    <link rel="stylesheet" href="../style.css">
</head>
<body>
    <article>
        <h1><?php echo $article['title'] ?></h1>
        <p><?php echo $article['content'] ?></p>
    </article>
</body>
</html>