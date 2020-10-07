<?php
// Disconnected and redirected to connexion.php if click on disconnection
session_start();
if(isset($_POST["deconnexion"])){
    session_destroy();
    header("location: connexion.php");
}
var_dump($_SESSION["user"])
;?>

<!-- nav with all links for differents pages of website for tablet and desktop interface, and a logo with index's link' -->
<nav>
  <div id="navBar">
    <ul class="nav">
      <li class="nav-item">
        <a class="nav-link" href="statistiques.php">Statistiques</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="blog.php">Blog</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="virement.php">Virement</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="new_account.php">Créer compte</a>
      </li>
    </ul>
  </div>

  <!-- burger menu for mobile interface with a nav's link -->
  <div class="dropdown">
    <button class="btn btn-secondary dropdown-toggle fa fa-bars fa-4x" type="button" id="menuBurger" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    </button>
    <div class="dropdown-menu" aria-labelledby="menuBurger">
      <a class="dropdown-item" href="connexion.php">Connexion</a>
      <a class="dropdown-item" href="statistiques.php">Statistiques</a>
      <a class="dropdown-item" href="blog.php">Blog</a>
      <a class="dropdown-item" href="virement.php">Virement</a>
      <a class="dropdown-item" href="new_account.php">Créer compte</a>
    </div>
  </div>

  <div id="disconnect">
    <a class="mr-1" href="connexion.php"><button type="button" name="button" class="btn btn-Success">Connexion</button></a>
    <form method="POST" class="mb-0">
      <button  type="submit" name="deconnexion" class="btn btn-danger">Déconnexion</button>
    </form>
  </div>

</nav>
