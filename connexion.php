<!-- title -->
<?php

$site_title = "La Banque non Populaire";
require "view/template/header.php";
require "modele/connexion_modele.php";
require "modele/connect_db.php";

// if a form is submitted we connect to the database
if(isset($_POST["connexion"])){

$user = info_user_from_email($db, $_POST["email"]);
var_dump($user);
  // if user as been found in database and if password match
  if($user){
    // checks if the entered password matches the database password on the entered user
    if(password_verify($_POST["mot_de_passe"], $user["password"])){
      session_start();
      $_SESSION["user"] = $user;
      header("location: index.php");
    }
  }
}
 ?>

<?php
require "view/connexion_view.php";
require "view/template/footer.php";
?>
