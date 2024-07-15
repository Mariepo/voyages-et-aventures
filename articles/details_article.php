<?php 
    session_start();
    require_once "functions.php";
    $id_article = $_GET["id_article"];
    $article = selectArticleByIdInBDD($id_article);
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Details de l'article</title>
    <link rel="stylesheet" href="../style.css">
</head>
<body class="main-background-color ">
    <?php 
        require_once "../header.php";
        buildHeader("../");
    ?>
    <main>
        <section class="section-article">
            <article>
                <?php 
                echo "<h1>" . $article['title'] . "</h1>";
                echo "<span>Écrit par " . returnUserNameFromArticle($article) . " le " . date_format(date_create($article['created_at']), 'Y-m-d') . "</span>";
                echo autoParagraph($article['content']) 
                ?>
            </article>
            <div class="article-actions">
                <?php  if ($article['user_id'] == $_SESSION["id_username"]) {
                    echo "<a href='modifier_article.php?action=edit&id_article=" .$article['id'] . "'>Modifier</a>";
                    echo "<a onclick='displayDeleteModal(\"" . addslashes($article['title']) . "\", \"" . $article['id'] . "\", \"" . $article['user_id'] . "\", \"supprimer_article.php\")' href='#' class='action-danger'>Supprimer</a>";
                }
                ?>
            </div>
        </section>
        <!-- Lise des commentaires -->
        <!-- Ajout commentaire -->
        <section class="section-article">
            <h2>Ajouter un commentaire</h2>
            <form action="./details_article.php?id_article=<?php echo $article['id'] ?>&action=insert_comment" method="post">
                <textarea name="comment" id="comment" class="comment-textarea" rows="4" placeholder="Votre commentaire" ></textarea>
                <button class="main-button" type="submit">Poster le commentaire</button>
                <?php
                    if($_SERVER['REQUEST_METHOD'] && isset($_GET['action']) && $_GET['action'] == 'insert_comment'){
                        if(empty($_POST['comment'])){
                            echo "<div class='danger-text'>Veuillez saisir votre commentaire</div>";
                        } else {
                            insertCommentInBDD($_POST['comment'], $_SESSION['id_username'], $id_article);
                            echo "<div class='success-text'>Commentaire ajouté avec succès</div>";
                        }
                    };
                ?>
            </form>
        </section>
    </main>

    <!-- Modal de suppresion -->
    <?php include_once "modal_suppression_article.php"; ?>
</body>
</html>
