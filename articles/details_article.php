<?php 
    session_start();
    require_once "functions.php";
    $id_article = $_GET["id_article"];
    $article = selectArticleByIdInBDD($id_article);

    function autoParagraph($text) {
        // Remplacer les retours à la ligne par des balises de paragraphe
        return '<p>' . preg_replace('/\n+/', '</p><p>', nl2br($text)) . '</p>';
    }
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Article</title>
    <link rel="stylesheet" href="../style.css">
</head>
<body class="main-background-color ">
    <header>
        <?php
            if(!isset($_SESSION["email"], $_SESSION["password"])){
                header('Location: ./login/inscription.php');
            } else {
                echo '<div class="header">';
                    echo '<h1><a href="../index.php">Bonjour ' . $_SESSION["username"] . '</h1>';
                    echo '<a href="./login/deconnexion.php">Se déconnecter</a>';
                echo "</div>";
            }
        ?>
    </header>
    <main class="container-article-details">
        <article>
            <?php 
            echo "<h1>" . $article['title'] . "</h1>";
            echo "<span>Écrit par " . returnUserNameFromArticle($article) . " le " . date_format(date_create($article['created_at']), 'Y-m-d') . "</span>";
            echo autoParagraph($article['content']) 
            ?>
        </article>
        <div class="article-actions">
        <?php 
            echo "<a href='modifier_article.php?action=edit&id_article=" .$article['id'] . "'>Modifier</a>";
            echo "<a onclick='displayDeleteModal(\"" . addslashes($article['title']) . "\", \"" . $article['id'] . "\", \"" . $article['user_id'] . "\", \"supprimer_article.php\")' href='#' class='action-danger'>Supprimer</a>";
            ?>
        </div>
    </main>

<!-- Modal de suppresion -->
<div id="js-delete-modal"  class="modal">
    <div class="delete-modal-content">
        <div class="delete-modal-header">
            <h2>Êtes-vous sûrs de vouloir supprimer l'article : <span id="article-name"></span> ?</h2>
            <button class="close-btn" onclick="closeElement('.modal')">X</button>
        </div>
        <form method="post" id="delete-form" class="delete-modal-actions">
            <div>
                <a href="" onclick="closeElement('.modal')">Annuler</a>
                <button type="submit" class="danger-button">Je supprime</button>
            </div>
        </form>
    </div>
</div>
<!-- Fin de la modal de suppresion -->

    <script>
        function closeElement(element){
            const componentToClose = document.querySelector(element);
            const closeButton = document.querySelector(".close-btn");
            componentToClose.style.display = "none";
        }
        function displayDeleteModal(articleName, articleID, userID, path){
            const deleteModal = document.querySelector("#js-delete-modal");
            const componentName = document.querySelector("#article-name");
            const deleteForm = document.querySelector("#delete-form");
            componentName.textContent = articleName;
            deleteForm.action = path + "?action=delete&id_article=" + articleID + "&id_user=" + userID;
            deleteModal.style.display = "block";
        }
        function autoParagraph(text){
            return '<p>' + text.split( /\n+/ ).join( '</p>\n<p>' ) + '</p>';
        }
    </script>
    </body>
</html>
