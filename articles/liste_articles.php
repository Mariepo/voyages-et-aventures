<?php
    // session_start();
    require_once "functions.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Articles</title>
    <link rel="stylesheet" href="../style.css">
</head>
<body>
    <div class="container-articles-list">
        <?php
            $articlesArray = selectArticlesInBDD();
            foreach($articlesArray as $article){
                echo "<div class='card'>";
                    // echo "<img src='" . $article['image'] . "'>";
                    echo "<h2>" . $article['title'] . "</h2>";
                    echo "<span>" . returnCategorieNameFromArticle($article) . "</span>";
                    // Limier la taille du contenu
                    $content = $article['content'];
                    echo "<p>" . limitContentSize($content, 200) . "</p>";
                    echo "<span>Écrit par " . returnUserNameFromArticle($article) . " le " . date_format(date_create($article['created_at']), 'Y-m-d') . "</span>";
                    echo "<a href='#' class='article-link'>Lire l'article</a>";
                echo "</div>";
            }
            ?>
    </div>
</body>
</html>
