<?php 
    session_start();
    require_once "functions.php";
    $id_article = $_GET["id_article"];
    $article = selectArticleByIdInBDD($id_article);

    function autoParagraph($text) {
        // Remplacer les retours à la ligne par des balises de paragraphe
        return '<p>' . preg_replace('/\n+/', '</p><p>', nl2br($text)) . '</p>';
    }
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Article</title>
    <link rel="stylesheet" href="../style.css">
</head>
<body class="main-background-color ">
    <?php 
        require_once "../header.php";
        buildHeader("../");
    ?>
    <main class="container-article-details">
        <article>
            <?php 
            echo "<h1>" . $article['title'] . "</h1>";
            echo "<span>Écrit par " . returnUserNameFromArticle($article) . " le " . date_format(date_create($article['created_at']), 'Y-m-d') . "</span>";
            echo autoParagraph($article['content']) 
            ?>
        </article>
        <div class="article-actions">
        <?php 
            echo "<a href='modifier_article.php?action=edit&id_article=" .$article['id'] . "'>Modifier</a>";
            echo "<a onclick='displayDeleteModal(\"" . addslashes($article['title']) . "\", \"" . $article['id'] . "\", \"" . $article['user_id'] . "\", \"supprimer_article.php\")' href='#' class='action-danger'>Supprimer</a>";
            ?>
        </div>
    </main>

    <!-- Modal de suppresion -->
    <?php include_once "modal_suppression_article.php"; ?>

    </body>
</html>
