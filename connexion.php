<!-- title -->
<?php $site_title = "La Banque non Populaire"; ?>

<!-- nav and header for all pages-->
<!-- and acounts.php -->
<?php
require "template/header.php";
include "data/acounts.php";
?>

<!-- main -->

<h3 class="text-light center starcraft pt-5" >Veuillez vous connecter pour acceder a l'application :</h3>

<form class="container mb-0 p-5" action="index.php" method="post">
  <div class="form-group text-light">
    <label>Login</label>
    <input type="text" class="form-control" name="login">
  </div>
  <div class="form-group text-light">
    <label>Password</label>
    <input type="password" class="form-control" name="mot_de_passe">
  </div>
  <button type="submit" class="btn btn-primary">Connexion</button>
</form>

<?php
require "template/footer.php";
?>
