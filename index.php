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

<div class="row justify-content-md-center mr-0">

  <?php
  // I get the accounts from acount.php and browse the tables with foreach
  $comptes = get_accounts();
  foreach ($comptes as $key => $value):
  ?>
<!-- on each turn of the loop created a card with an account -->
  <div id="account" class="card col- col-sm-4 col-lg-3 m-5 mb-5" style="width: 18rem;">
    <img class="card-img-top pt-3" src="public/img/money.jpg" alt="money_picture">
    <div class="card-body">
      <h5 class="card-title"><?php echo $value["name"]; ?></h5>
      <p class="card-text"><?php echo $value["number"]; ?></p>
    </div>
    <ul class="list-group list-group-flush">
      <li class="list-group-item"><?php echo $value["owner"]; ?></li>
      <li class="list-group-item"><?php echo $value["amount"]; ?></li>
      <li class="list-group-item"><?php echo $value["last_operation"]; ?></li>
    </ul>
    <div class="card-body">
      <a type="button" class="btn btn-primary card-link text-light" id="account_link" href='compte.php<?php echo "?param=$key"; ?>'>Voir</a>
    </div>
  </div>

  <?php
  endforeach
  ?>

</div>
<script src="public/js/layer.js"></script>
<!-- footer -->
<?php
require "template/footer.php";
?>
