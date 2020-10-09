<?php

session_start();

// if $_SESSION is empty redirect to the connexion.php
if(!isset($_SESSION["user"]) || empty($_SESSION["user"])){
  header("location: connexion.php");
}

try{
$db = new PDO('mysql:host=localhost;dbname=banque_PHP', 'banquePHP', 'root');
}
catch(PODException $e){
  print "Erreur ! :".$getMessage()."<br>";
  die();
}

// request to retrieve the user's email to display it in the nav
$query = $db->prepare(
  "SELECT email
  FROM User
  WHERE email = :email"
);

$execute = $query->execute([
  "email"=>$_SESSION["user"]["email"]
]);

$mail=$query->fetch(PDO::FETCH_ASSOC);

// Disconnected and redirected to connexion.php if click on disconnection
if(isset($_POST["deconnexion"])){
    session_destroy();
    header("location: connexion.php");
}
?>

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
      <a href="#"></a>
    </div>
  </div>

<!-- disconnects the session and displays the connected account -->
  <div id="disconnect">
    <span class="text-light mt-2 mr-2"><?php echo $mail["email"]; ?></span>
    <form method="POST" class="mb-0">
      <button  type="submit" name="deconnexion" class="btn btn-danger">Déconnexion</button>
    </form>
  </div>

</nav>
