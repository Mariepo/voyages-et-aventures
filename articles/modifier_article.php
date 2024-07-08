<?php
    session_start();
    require_once "functions.php";
    // if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_GET['action']) && $_GET['action'] == 'insert'){
    //     if(empty($_POST["title"] || $_POST["content"])){
    //         echo 'Merci de remplir les champs Titre et Contenu';
    //     } else {
    //         insertArticleInBDD($_POST["title"], $_POST["content"], $_POST["categorie"], $_SESSION['id_username']);
    //     }
    // }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style.css">
</head>
<body class="main-background-color">
    <div  id="form-container">
        <h2>Modifier un article</h2>
        <form action="?action=edit" method="POST">
            <div>
                <label for="title">Titre *</label>
                <input type="text" name="title" placeholder="Titre de votre article">
            </div>
            <div>
                <label for="content">Contenu *</label>
                <textarea name="content" id="content" rows="14" placeholder="Contenu de votre article"></textarea>
            </div>
            <div>
                <label for="categorie">Catégorie :</label>
                <select name="categorie" id="categorie">
                    <?php
                        $categorieArray = selectCategoriesInBDD();
                        foreach($categorieArray as $categorie){
                    ?>
                        <option value="<?php echo htmlspecialchars($categorie['id']); ?>"><?php echo htmlspecialchars($categorie['name']); ?></option>
                    <?php 
                        } 
                    ?>
                </select>
            </div>
            <div>
                <button type="submit">Modifer l'article</button>
                <a href="../index.php" class="button">Annuler</a>
            </div>
        </form>
    </div>
</body>
</html>
