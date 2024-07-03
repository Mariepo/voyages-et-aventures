<?php
    session_start();
    require_once __DIR__ . '/../bdd.php';
    require_once "functions.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style.css">
</head>
<body>
    <div  id="form-container">
        <h2>Ajouter un article</h2>
        <form action="?action=insert" method="POST">
            <div>
                <label for="title">Titre :</label>
                <input type="text" name="title" placeholder="Titre de votre article">
            </div>
            <div>
                <label for="content">Contenu :</label>
                <textarea name="content" id="content" rows="14">Contenu de votre article</textarea>
            </div>
            <div>
                <label for="categorie">Catégorie :</label>
                <select name="categorie" id="categorie">
                    <?php
                        $categorieArray = selectCategoriesInBDD();
                        foreach($categorieArray as $categorie){
                    ?>
                            <option><?php echo $categorie["name"]; ?></option>
                    <?php 
                        } 
                    ?>
                </select>
            </div>
            <div>
                <button type="submit">Ajouter l'article</button>
            </div>
        </form>
    </div>
</body>
</html>
