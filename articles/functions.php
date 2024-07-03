<?php
    require_once __DIR__ . '/../bdd.php';

    // BBD Models SELECT
    function selectArticlesInBDD(){
        global $conn;
        $sql_select_articles = "SELECT title, content, image, user_id, category_id, created_at FROM Articles ORDER BY created_at DESC;";
        $requete_select_articles = $conn->prepare($sql_select_articles);
        $requete_select_articles->execute();
        return $requete_select_articles->fetchAll(PDO::FETCH_ASSOC);
    };
    function selectCategoriesInBDD(){
        global $conn;
        $sql_select_categories = "SELECT id, name FROM Categories;";
        $requete_select_categories = $conn->prepare($sql_select_categories);
        $requete_select_categories->execute();
        return $requete_select_categories->fetchAll(PDO::FETCH_ASSOC);
    }
    function selectUserInBDD(){
        global $conn;
        $sql_select_user = "SELECT id, username, email FROM Users;";
        $requete_select_user = $conn->prepare($sql_select_user);
        $requete_select_user->execute();
        return $requete_select_user->fetchAll(PDO::FETCH_ASSOC);
    }

    // BBD Models INSERT
    function insertArticleInBDD($title, $content, $categorie, $user){
        global $conn;
        $sql_insert_article = "INSERT INTO Articles(title, content, category_id, user_id) VALUES(:title, :content, :categorie, :user);";
        $requete_insert_article = $conn->prepare($sql_insert_article);
        $requete_insert_article->execute(
            array(
                ":title" => htmlspecialchars($title),
                ":content" => htmlspecialchars($content),
                ":categorie" => intval($categorie),
                ":user" => htmlspecialchars($user)
            )
        );
        header('Location:../index.php?action=success');
    }

    // Display
    function returnCategorieNameFromArticle($article){
        $categoriesArray = selectCategoriesInBDD();
        foreach($categoriesArray as $categorie){
            if($categorie['id'] == $article['category_id']){
                return $categorie['name'];
            }
        }
    }
    function returnUserNameFromArticle($article){
        $userArray = selectUserInBDD();
        foreach($userArray as $user){
            if($user["id"] == $article["user_id"]){
                return $user["username"];
            }
        }
    }
    function limitContentSize($contenu, $maxSize){
        if(mb_strlen($contenu) > $maxSize){
            return $contenu = mb_substr($contenu, 0, $maxSize) . '...';
        }
    }

