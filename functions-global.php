<?php 
// Success and error handlers
    function displaySuccessBanner(){
        if (isset($_GET["insert"]) && $_GET["insert"] == "success") {
            echo '<div class="banner banner-success">';
                echo '<span">Article ajouté avec succès !</span>';
                echo '<button class="close-btn" onclick=\'closeElement(".banner")\'>X</button>';
            echo '</div>';
        } else if (isset($_GET['update']) && $_GET['update'] == 'success'){
            echo '<div class="banner banner-success">';
                echo '<span">Article modifié avec succès !</span>';
                echo '<button class="close-btn" onclick=\'closeElement(".banner")\'>X</button>';
            echo '</div>';
        } else if (isset($_GET['delete']) && $_GET['delete'] == 'success'){
            echo '<div class="banner banner-success">';
                echo '<span">Article supprimé avec succès !</span>';
                echo '<button class="close-btn" onclick=\'closeElement(".banner")\'>X</button>';
            echo '</div>';
        }
    }; 
    function displayErrorBanner(){
        if (isset($_GET["delete"]) && $_GET["delete"] == "error") {
            echo '<div class="banner banner-error">';
                echo '<span">Vous ne pouvez pas supprimer cet article</span>';
                echo '<button class="close-btn" onclick=\'closeElement(".banner")\'>X</button>';
            echo '</div>';
        } elseif (isset($_GET["delete_comment"]) && $_GET["delete_comment"] == "error") {
            echo '<div class="banner banner-error">';
                echo '<span">Vous ne pouvez pas supprimer ce commentaire</span>';
                echo '<button class="close-btn" onclick=\'closeElement(".banner")\'>X</button>';
            echo '</div>';            
        };
    }