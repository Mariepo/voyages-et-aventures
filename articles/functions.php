<?php
    require_once __DIR__ . '/../bdd.php';
    // BBD
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
?>