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
                    echo "<div class='card-content'>";
                        echo "<h2>" . $article['title'] . "</h2>";
                        echo "<span>" . returnCategorieNameFromArticle($article) . "</span>";
                        // Limier la taille du contenu
                        $content = $article['content'];
                        echo "<p>" . limitContentSize($content, 300) . "</p>";
                        echo "<span>Écrit par " . returnUserNameFromArticle($article) . " le " . date_format(date_create($article['created_at']), 'Y-m-d') . "</span>";
                    echo "</div>";
                    echo "<div class='card-actions'>";
                        echo "<a href='articles/details_article.php?id_article=" . $article['id'] . "' class='article-link'>Lire l'article</a>";
                        if($article['user_id'] == $_SESSION["id_username"]) {
                            echo "<div>";
                            echo "<a href='articles/modifier_article.php?action=edit&id_article=" .$article['id'] . "'>Modifier</a>";
                            echo "<a onclick='displayDeleteModal(\"" . addslashes($article['title']) . "\", \"" . $article['id'] . "\", \"" . $article['user_id'] . "\", \"articles/supprimer_article.php\")' href='#' class='action-danger'>Supprimer</a>";
                            echo "</div>";
                        }
                    echo "</div>";
                echo "</div>";
            }
        ?>
    </div>

    <!-- Modal de suppresion -->
    <?php include_once "modal_suppression_article.php"; ?>

</body>
</html>


