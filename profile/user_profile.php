<?php 
    session_start();
    require_once "functions.php";
    require_once "../functions-global.php";
    $id_user = $_SESSION["id_username"];
    $user = selectUserByIdInBDD($id_user);
    if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_GET['action']) && $_GET['action'] == 'edit'){
        editUserInBdd($_POST['username'], $_POST['email'], $_POST['password'], $id_user);
        $_SESSION["username"] = $_POST['username'];
    }
    displaySuccessBanner();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Paramètres</title>
    <link rel="stylesheet" href="../style.css">
    <link href="https://fonts.googleapis.com/css?family=Material+Icons|Material+Icons+Outlined|Material+Icons+Two+Tone|Material+Icons+Round|Material+Icons+Sharp" rel="stylesheet">
</head>
<body class="main-background-color ">
    <?php 
        require_once "../header.php";
        buildHeader("..", "../");
    ?>
    <section class="section-profile">
        <form action="?action=edit" method="POST">
            <h1>Paramètres</h1>
            <div>
                <label for="username">Nom d'utilisateur</label>
                <input type="text" name="username" placeholder="Nom d'utilisateur" value="<?php echo $user['username'] ?>">
            </div>
            <div>
                <label for="email">Email : </label>
                <input type="email" name="email" placeholder="Email" value="<?php echo $user['email'] ?>">
            </div>
            <div>
                <label for="password">Mot de passe : </label>
                <input type="password" name="password" placeholder="Mot de passe" value="">
            </div>
            <div>
                <button type="submit" class="main-button">Enregistrer les modifications</button>
                <a href="../index.php" class="button">Annuler</a>
            </div>
        </form>
    </section>
</body>
</html>

<script>
        function closeElement(element){
            const componentToClose = document.querySelector(element);
            const closeButton = document.querySelector(".close-btn");
            componentToClose.style.display = "none";
            // window.location.replace("./");
        }
    </script>