<?php
    session_start();
    require_once "./functions-global.php";
    displaySuccessBanner('Destination ajoutée avec succès !');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Voyages et aventures</title>
    <link rel="stylesheet" href="./style.css">
</head>
<body>
    <header>
        <?php
            if(!isset($_SESSION["email"], $_SESSION["password"])){
                header('Location: ./login/inscription.php');
            } else {
                echo '<div class="header">';
                    echo '<h1>Bonjour ' . $_SESSION["username"] . '</h1>';
                    echo '<a href="./login/deconnexion.php">Se déconnecter</a>';
                echo "</div>";
            }
        ?>
    </header>
    <main>
        <div class="container-articles">
            <div class="container-articles-title">
                <h2>Nos articles</h2>
                <button onclick="redirectToCreateArticle()">Ajouter un article</button>
            </div>
            <?php
                include("./articles/liste_articles.php");
            ?>
        </div>
    </main>

    <script>
        function redirectToCreateArticle(){
            window.location.replace('./articles/ajout_article.php');
        }
        function closeElement(element){
            const componentToClose = document.querySelector(element);
            const closeButton = document.querySelector(".close-btn");
            componentToClose.style.display = "none";
            window.location.replace("./");
        }
    </script>
</body>
</html>



