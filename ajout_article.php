<?php
    session_start();
    echo "<br>";
    echo "Accès autorisé, bonjour " . $_SESSION["username"];
?>
