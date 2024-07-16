<?php
    function buildHeader($pathRoot, $pathParent){
?>
    <header>
        <?php
            if(!isset($_SESSION["email"], $_SESSION["password"])){
                header('Location: ./login/inscription.php');
                exit;
            } else { ?>
               <div class="header">
                    <h1><a href="<?php echo $pathRoot ?>">Bonjour <?php echo $_SESSION["username"] ?></a></h1>
                    <div class="user-profile-dropdown">
                        <img src="<?php echo $pathRoot ?>/img/profile/user-avatar.svg" alt="avatar de l\'utilisateur" class="user-profile-btn" onclick="displayDrodpdown()"/>
                        <div id="profile-dropdown-content" class="dropdown-content">
                            <a href=" <?php echo $pathParent ?>profile/user_profile.php"><span class="material-icons-outlined icon">settings</span>Paramètres</a>
                            <div class="horizontal-divider"></div>
                            <a href=" <?php echo $pathParent ?>login/deconnexion.php"><span class="material-icons-outlined icon">logout</span>Se déconnecter</a>
                        </div>
                    </div>
                </div>
            <?php } ?>
    </header>
<?php
    }
?>

<script>
function displayDrodpdown() {
  document.getElementById("profile-dropdown-content").classList.toggle("show-dropdown");
}

// Close the dropdown menu if the user clicks outside of it
window.onclick = function(event) {
  if (!event.target.matches('.user-profile-btn')) {
    var dropdowns = document.getElementsByClassName("dropdown-content");
    for (var i = 0; i < dropdowns.length; i++) {
      var openDropdown = dropdowns[i];
      if (openDropdown.classList.contains('show-dropdown')) {
        openDropdown.classList.remove('show-dropdown');
      }
    }
  }
}
</script>