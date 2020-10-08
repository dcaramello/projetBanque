<!-- title -->
<?php

$site_title = "La Banque non Populaire";
require "template/header.php";

// if a form is submitted we connect to the database
if(isset($_POST["connexion"])){
  try{
  $db = new PDO('mysql:host=localhost;dbname=banque_PHP', 'banquePHP', 'root');
  }
  catch(PDOException $e){
    print "Erreur !: ".$getMessage()." <br>";
    die();
  }

  $query = $db->prepare(
    "SELECT * FROM User
    WHERE email = :email"
  );


  $execute = $query->execute([
    "email"=>$_POST["email"]
  ]);

  $user=$query->fetch(PDO::FETCH_ASSOC);

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

<!-- main -->

<h3 class="text-light center starcraft pt-5" >Veuillez vous connecter pour acceder a l'application :</h3>

<form class="container mb-0 p-5" action="" method="post">
  <div class="form-group text-light">
    <label>identifiant</label>
    <input type="text" class="form-control" name="email">
  </div>
  <div class="form-group text-light">
    <label>Mot de passe</label>
    <input type="password" class="form-control" name="mot_de_passe">
  </div>
  <button type="submit" class="btn btn-primary" name="connexion">Connexion</button>
</form>

<?php
require "template/footer.php";
?>
