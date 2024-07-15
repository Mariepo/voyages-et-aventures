<?php
    session_start();
    require_once "functions.php";
    $id_article = $_GET["id_article"];
    $article = selectArticleByIdInBDD($id_article);
    if ($article['user_id'] != $_SESSION["id_username"]){
        header('Location: ../index.php');
    }
    if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_GET['action']) && $_GET['action'] == 'update'){
        if(empty($_POST["title"] || $_POST["content"])){
            echo '<div class="action-danger">Merci de remplir les champs Titre et Contenu</div>';
        } elseif (empty($_POST["title"])){
            echo '<div class="action-danger">Merci de remplir le champ Titre</div>';
        } elseif (empty($_POST["content"])){
            echo '<div class="action-danger">Merci de remplir le champ Contenu</div>';
        } else {
            editArticleInBDD($_GET['id_article'], $_POST['title'], $_POST['content'], $_POST['categorie'], $_SESSION["id_username"] );
        }
    }

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style.css">
</head>
<body class="main-background-color">
    <div  id="form-container">
        <h2>Modifier l'article</h2>
        <form action="?action=update&id_article=<?php echo $id_article; ?>" method="POST">
            <div>
                <label for="title">Titre *</label>
                <input type="text" name="title" placeholder="Titre de votre article" value="<?php echo $article['title']; ?>">
            </div>
            <div>
                <label for="content">Contenu *</label>
                <textarea name="content" id="content" rows="14" placeholder="Contenu de votre article"><?php echo $article['content']; ?></textarea>
            </div>
            <div>
                <label for="categorie">Catégorie :</label>
                <select name="categorie" id="categorie">
                    <option selected value="<?php echo htmlspecialchars($article['category_id']); ?>"><?php echo returnCategorieNameFromArticle($article); ?></option>
                    <?php
                        $categorieArray = selectCategoriesInBDD();
                        foreach($categorieArray as $categorie){
                            // if ($categorie['name'] == ) continue;
                    ?>
                        <option value="<?php echo htmlspecialchars($categorie['id']); ?>"><?php echo htmlspecialchars($categorie['name']); ?></option>
                    <?php 
                        } 
                    ?>
                </select>
            </div>
            <div>
                <button type="submit" class="main-button">Modifier l'article</button>
                <a href="../index.php" class="button">Annuler</a>
            </div>
        </form>
    </div>
</body>
</html>
