<?php
    // session_start();
    require_once "functions.php";
?>
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
                    echo "<p>" . limitContentSize($content, 300) . "</p>";
                    echo "<span>Écrit par " . returnUserNameFromArticle($article) . " le " . date_format(date_create($article['created_at']), 'Y-m-d') . "</span>";
                    echo "<a href='#' class='article-link'>Lire l'article</a>";
                    if($article['user_id'] == $_SESSION["id_username"]) {
                        echo "<a href='articles/modifier_article.php?action=edit&id_article=" .$article['id'] . "'>Modifier</a>";
                    }
                echo "</div>";
            }
        ?>
    </div>
</body>
</html>
