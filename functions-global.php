<?php 
// Success and error handlers
    function displaySuccessBanner(){
        if (isset($_GET["create"]) && $_GET["create"] == "success") {
            echo '<div class="banner banner-success">';
                echo '<span">Destination ajoutée avec succès !</span>';
                echo '<button class="close-btn" onclick=\'closeElement(".banner")\'>X</button>';
            echo '</div>';
        } else if (isset($_GET['update']) && $_GET['update'] == 'success'){
            echo '<div class="banner banner-success">';
                echo '<span">Destination modifiée avec succès !</span>';
                echo '<button class="close-btn" onclick=\'closeElement(".banner")\'>X</button>';
            echo '</div>';
        }
    }; 