<?php
    require_once "../bdd.php";
    // BBD
    function selectArticlesInBDD(){
        global $conn;
        $sql_select_articles = "SELECT title, content, image, user_id, category_id, created_at FROM Articles";
        $requete_select_articles = $conn->prepare($sql_select_articles);
        $requete_select_articles->execute();
        return $requete_select_articles->fetchAll(PDO::FETCH_ASSOC);
    };
    function selectCategoriesInBDD(){
        global $conn;
        $sql_select_categories = "SELECT id, name FROM Categories";
        $requete_select_categories = $conn->prepare($sql_select_categories);
        $requete_select_categories->execute();
        return $requete_select_categories->fetchAll(PDO::FETCH_ASSOC);
    }
    
    // Display
    function returnCategorieName($article){
        $categoriesArray = selectCategoriesInBDD();
        foreach($categoriesArray as $categorie){
            if($categorie['id'] == $article['category_id']){
                return $categorie['name'];
            }
        }
    }
    function limitContentSize($contenu, $maxSize){
        if(mb_strlen($contenu) > $maxSize){
            return $contenu = mb_substr($contenu, 0, $maxSize) . '...';
        }
    }
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
                    echo "<span>" . returnCategorieName($article) . "</span>";
                    // Limier la taille du contenu
                    $content = $article['content'];
                    echo "<p>" . limitContentSize($content, 200) . "</p>";
                    echo "<span>Écrit par " . $article['user_id'] . " le " . $article['created_at'] . "</span>";
                    echo "<a href='#' class='article-link'>Lire l'article</a>";
                echo "</div>";
            }
            ?>
    </div>
</body>
</html>
