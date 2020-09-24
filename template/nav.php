<!-- nav with all links for differents pages of website for tablet and desktop interface, and a logo with index's link' -->
<nav>
  <div id="navBar">
    <ul class="nav">
      <li class="nav-item">
        <a class="nav-link" href="compte.php">compte</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="statistiques.php">Statistiques</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="blog.php">Blog</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="virement.php">Virement</a>
      </li>
    </ul>
  </div>
  <a href="index.php"><img id="logoBank" src="public/img/bank.png" alt="logoBank"></a>

  <!-- burger menu for mobile interface with a nav's link -->
  <div class="dropdown">
    <button class="btn btn-secondary dropdown-toggle fa fa-bars fa-4x" type="button" id="menuBurger" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    </button>
    <div class="dropdown-menu" aria-labelledby="menuBurger">
      <a class="dropdown-item" href="compte.php">Compte</a>
      <a class="dropdown-item" href="statistiques.php">Statistiques</a>
      <a class="dropdown-item" href="blog.php">Blog</a>
      <a class="dropdown-item" href="virement.php">Virement</a>
    </div>
  </div>

  <button id="createAccount" type="button" class="btn btn-primary">Créer compte</button>
</nav>
