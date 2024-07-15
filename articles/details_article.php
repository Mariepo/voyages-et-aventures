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
    <link href="https://fonts.googleapis.com/css?family=Material+Icons|Material+Icons+Outlined|Material+Icons+Two+Tone|Material+Icons+Round|Material+Icons+Sharp" rel="stylesheet">
</head>
<body class="main-background-color ">
    <?php 
        require_once "../header.php";
        buildHeader("..", "../");
    ?>
    <main>
        <section class="section-article">
            <article>
                <?php 
                echo "<h1>" . $article['title'] . "</h1>";
                echo "<p class='article-details'>Écrit par " . returnUserNameFromArticle($article) . " le " . date_format(date_create($article['created_at']), 'Y-m-d') . "</p>";
                echo autoParagraph($article['content']) 
                ?>
            </article>
            <div class="article-actions">
                <?php  if ($article['user_id'] == $_SESSION["id_username"]) {
                    echo "<a href='modifier_article.php?action=edit&id_article=" .$article['id'] . "'>Modifier</a>";
                    echo "<a onclick=\"displayDeleteModal('" . addslashes($article['title']) . "', '" . $article['id'] . "', 'articles/supprimer_article.php')\" href='#' class='action-danger'>Supprimer</a>";
                }
                ?>
            </div>
        </section>
        <section class="section-article">
            <div class="add-comment">
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
            </div>
            <div class="view-comment">
                <h2>Commentaires</h2>
                <?php
                $commentsArray = selectCommentInBDD();
                foreach ($commentsArray as $comment) { 
                    if($comment['article_id'] == $id_article) {
                        ?>
                <div class="comment">
                    <p><?php echo $comment["content"] ?></p>
                    <div class="comment-details">
                        <span class="comment-details-author"><?php echo $comment['username'] ?></span>
                        <span class="comment-details-divider">•</span>
                        <span class="comment-details-date">le <?php echo date_format(date_create($comment['created_at']), 'Y-m-d'); ?></span>
                        <?php
                        if ($comment['user_id'] == $_SESSION["id_username"]) { ?>
                            <a href="./supprimer_commentaire.php?id_article=<?php echo $article['id'] ?>&action=delete_comment&comment_id=<?php echo $comment['id']; ?>" class="comment-details-date action-danger">Supprimer</a>
                        <?php }; ?>
                    </div>
                </div>
                <?php }} ?>
            </div>
        </section>
    </main>

    <!-- Modal de suppresion -->
    <?php include_once "modal_suppression_article.php"; ?>
</body>
</html>
