<?php
    session_start();
    require_once "./functions-global.php";
    displaySuccessBanner();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Voyages et aventures</title>
    <link rel="stylesheet" href="./style.css">
</head>
<body class="main-background-color">
    <?php 
        require_once "header.php";
        buildHeader("./");
     ?>
    <main>
        <div class="container-articles">
            <div class="container-articles-title">
                <h2>Nos articles</h2>
                <button class="main-button" onclick="redirectToCreateArticle()">Ajouter un article</button>
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



