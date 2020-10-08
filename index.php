<?php
$site_title = "La Banque non Populaire";
require "template/nav.php";
require "template/header.php";
include "data/acounts.php";

$query = $db->prepare(
  "SELECT u.lastname, u.firstname, a.account_type, a.opening_date, a.amount
  FROM User AS u
  INNER JOIN Account AS a
  ON u.id = a.user_id AND u.id = :user_id"
);

$execute = $query->execute([
  "user_id"=>$_SESSION["user"]["id"]
]);

$accounts=$query->fetchAll(PDO::FETCH_ASSOC);
?>

<!-- main -->
    <!-- layer -->
    <div id="blocLayer">
      <div class="layer center">
        <h2 class="gotham">Règles de sécurité</h2>
        <input type="button" value="J'ai compris" class="btn btn-dark" id="hiddenLayer">
        <div id="securite_layer">
        </div>
      </div>
    </div>

    <div class="center gotham">
      <h2 class="text-light starcraft">Vos comptes</h2>
    </div>

    <div class="row justify-content-md-center">
      <?php foreach ($accounts as $key => $account): ?>
      <!-- on each turn of the loop created a card with an account -->
        <div id="account" class="card col- col-sm-4 col-lg-3 m-5 mb-5" style="width: 18rem;">
          <img class="card-img-top pt-3" src="public/img/money.jpg" alt="money_picture">
          <div class="card-body">
            <h3 class="card-title"><?php echo $account["lastname"]." ".$account["firstname"]; ?></h3>
            <h5 class="card-title"><?php echo $account["account_type"]; ?></h5>
            <p class="card-text">Date d'ouverture : <?php echo $account["opening_date"]; ?></p>
          </div>
          <ul class="list-group list-group-flush">
            <li class="list-group-item">Solde : <?php echo $account["amount"]; ?></li>
          </ul>
          <div class="card-body">
            <a name="" type="button" class="btn btn-primary card-link text-light" id="account_link" href='compte.php<?php echo "?param=$key"; ?>'>Voir</a>
          </div>
        </div>
      <?php
    endforeach;

?>
</div>

<!-- footer -->
<?php

$script = "<script src='public/js/layer.js'></script>";
require "template/footer.php";
?>
