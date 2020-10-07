<!-- title -->
<?php $site_title = "La Banque non Populaire"; ?>

<!-- nav and header for all pages-->
<!-- and acounts.php -->
<?php
require "template/nav.php";
require "template/header.php";
include "data/acounts.php";
?>

<!-- main -->

<h2 class="starcraft center text-light">Nouveau compte</h2>

<!-- account creation form with name, number, owner, and amount-->
<div class="row justify-content-md-center">

  <form class="text-light center col- col-lg-4 " action="new_account.php" method="post">

      <div class="form-check mb-2" style="width: 18rem;">
        <input class="form-check-input" type="radio" name="name" id="exampleRadios1" value="Compte courant">
        <label class="form-check-label" for="exampleRadios1">
          Compte courant
        </label>
      </div>


      <div class="form-check mb-2" style="width: 18rem;">
        <input class="form-check-input" type="radio" name="name" id="exampleRadios2" value="Livret A">
        <label class="form-check-label" for="exampleRadios2">
          Livret A
        </label>
      </div>


      <div class="form-check mb-2" style="width: 18rem;">
        <input class="form-check-input" type="radio" name="name" id="exampleRadios3" value="PEL">
        <label class="form-check-label" for="exampleRadios3">
          PEL
        </label>
      </div>

      <div class="form-row mb-2" style="width: 18rem;">
        <label>Nom</label>
        <input type="text" class="form-control" name="owner">
    </div>

    <div class="form-row mb-2" style="width: 18rem;">
      <label>Montant</label>
      <input type="number" class="form-control" name="amount" min="50" placeholder="50">
    </div>

    <button class="btn btn-primary" type="submit" name="créer" value="créer">Créer</button>
  </form>

<!-- if we click on "créer" the values ​​entered in the form are stored in the array $compte with array_map -->
  <?php
  $compte = "Veuillez créer un compte";
  if (isset($_POST["créer"]) AND !empty($_POST["créer"])) {
    $compte = array_map("htmlspecialchars", $_POST);
  ?>

<!-- a card that displays account information "name", "owner" and "amount", number is predefined-->

  <div class="col- col-lg-4 center">
    <div>
      <h4 class="starcraft text-light">Votre compte</h4>
    </div>
    <div id="account" class="card" style="width: 18rem;">
      <img class="card-img-top pt-3" src="public/img/money.jpg" alt="money_picture">
      <div class="card-body">
        <h5 class="card-title">Compte : <?php echo htmlspecialchars($compte["name"]); ?></h5>
        <p class="card-text">Numéro : N:0132520024 fr 45</p>
      </div>
      <ul class="list-group list-group-flush">
        <li class="list-group-item">Propriétaire : <?php echo htmlspecialchars($compte["owner"]); ?></li>
        <li class="list-group-item">Solde : <?php echo htmlspecialchars($compte["amount"]); ?></li>
        <li class="list-group-item">Derniére opération : Pas d'opération</li>
      </ul>
    </div>
  </div>

  <?php
  }
  ?>
</div>


<div class="center mt-5 pb-5">
  <a type="button" class="btn btn-primary" href="index.php">Retour</a>
</div>


<!-- footer -->
<?php
require "template/footer.php";
?>
