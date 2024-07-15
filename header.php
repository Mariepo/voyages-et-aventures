<?php
    function buildHeader($pathHome, $pathDeconnect){
?>
    <header>
        <?php
            if(!isset($_SESSION["email"], $_SESSION["password"])){
                header('Location: ./login/inscription.php');
                exit;
            } else {
                echo '<div class="header">';
                    echo '<h1><a href="' . $pathHome . '">Bonjour ' . $_SESSION["username"] . '</a></h1>';
                    echo '<a href="' . $pathDeconnect . 'login/deconnexion.php">Se déconnecter</a>';
                echo "</div>";
            }
        ?>
    </header>
<?php
    }
?>