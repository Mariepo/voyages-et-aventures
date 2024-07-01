<?php
    require_once "../bdd.php";
    function selectArticlesInBDD(){
        global $conn;
        $sql_select_articles = "SELECT title, content, image, user_id, category_id, created_at FROM Articles";
        $requete_select_articles = $conn->prepare($sql_select_articles);
        $requete_select_articles->execute();
        return $requete_select_articles->fetchAll(PDO::FETCH_ASSOC);
    };
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
    <h1>Nos articles</h1>
    <div class="container-articles">
        <?php
            $articlesArray = selectArticlesInBDD();
            foreach($articlesArray as $article){
                echo "<div class='card'>";
                    // echo "<img src='" . $article['image'] . "'>";
                    echo "<h2>" . $article['title'] . "</h2>";
                    echo "<span>" . $article['category_id'] . "</span>";
                    // Limier la taille de content
                    $content = $article['content'];
                    if(mb_strlen($content) > 100){
                        $content = mb_substr($content, 0, 100) . '...';
                    }
                    echo "<p>" . $content . "</p>";
                    echo "<span>Écrit par " . $article['user_id'] . " le " . $article['created_at'] . "</span>";
                    echo "<a href='#' class='article-link'>Lire l'article</a>";
                echo "</div>";
            }
            ?>
    </div>
</body>
</html>
