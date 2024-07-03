<?php 
// Success and error handlers
    function displaySuccessBanner($message){
        if (isset($_GET["action"]) && $_GET["action"] == "success") {
            echo '<div class="banner banner-success">';
                echo '<span">' . $message .'</span>';
                echo '<button class="close-btn" onclick=\'closeElement(".banner")\'>X</button>';
            echo '</div>';
        }
    }; 