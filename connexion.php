<?php

$site_title = "La Banque non Populaire";
require "view/template/header.php";
require "model/userManager.php";


$userModel = new UserModel();

// if a form is submitted we connect to the database
if(isset($_POST["connexion"])){

$user = $userModel->getUserByEmail($_POST["email"]);

  // if user as been found in database and if password match
  if($user){
    // checks if the entered password matches the database password on the entered user
    if(password_verify($_POST["mot_de_passe"], $user["password"])){
      session_start();
      $_SESSION["user"] = $user;
      header("location: home.php");
    }
  }
}

require "view/connexionView.php";
require "view/template/footer.php";

