<div id="js-delete-modal" class="modal">
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
</script>