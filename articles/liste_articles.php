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
                        echo "<a href='#' class='article-link'>Lire l'article</a>";
                        if($article['user_id'] == $_SESSION["id_username"]) {
                            echo "<div>";
                            echo "<a href='articles/modifier_article.php?action=edit&id_article=" .$article['id'] . "'>Modifier</a>";
                            // echo "<a href='articles/supprimer_article.php?action=edit&id_article=" .$article['id'] . "' class='action-danger'>Supprimer</a>";
                            echo "<a onclick='displayDeleteModal(\"" . $article['title'] . "\")' href='#' class='action-danger'>Supprimer</a>";
                            echo "</div>";
                        }
                    echo "</div>";
                echo "</div>";
            }
        ?>
    </div>

<!-- Modal de suppresion -->
<div id="js-delete-modal"  class="modal">
    <div class="modal-content">
        <button class="close-btn" onclick="closeElement('.modal')">X</button>
        <h2>Êtes-vous sûrs de vouloir supprimer l'article : <span id="article-name"></span> ?</h2>
        <form method="post" action="../../controllers/admin/destinations-controller.php?action=confirmDelete">
            <input type="hidden" id="modal-destination-id" name="id_destination" value="">
            <button type="submit" class="danger-button">Je supprime</button>
            <button type="button" onclick="closeElement('.modal')">Annuler</button>
        </form>
    </div>
</div>
<!-- Fin de la modal de suppresion -->

</body>
</html>


<script>
    function closeElement(element){
        const componentToClose = document.querySelector(element);
        const closeButton = document.querySelector(".close-btn");
        componentToClose.style.display = "none";
        // window.location.replace("../../controllers/admin/destinations-controller.php");
    }
    function displayDeleteModal(articleName){
        const deleteModal = document.querySelector("#js-delete-modal");
        console.log(deleteModal);
        // const modalDestinationId = document.querySelector("#modal-destination-id");
        const componentName = document.querySelector("#article-name");
        // modalDestinationId.value = id_destination;
        componentName.textContent = articleName;
        deleteModal.style.display = "block";
    }
</script>
