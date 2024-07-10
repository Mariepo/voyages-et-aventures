<?php
    function buildHeader($path){
?>
    <header>
        <?php
            if(!isset($_SESSION["email"], $_SESSION["password"])){
                header('Location: ./login/inscription.php');
                exit;
            } else {
                echo '<div class="header">';
                    echo '<h1><a href="' . $path . '">Bonjour ' . $_SESSION["username"] . '</a></h1>';
                    echo '<a href="./login/deconnexion.php">Se déconnecter</a>';
                echo "</div>";
            }
        ?>
    </header>
<?php
    }
?>