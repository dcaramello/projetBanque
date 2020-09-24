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
<!-- <div id="blocLayer">
  <div class="layer center">
    <h2 class="gotham">Règles de sécurité</h2>
    <input type="button" value="J'ai compris" class="btn btn-dark" id="hiddenLayer">
    <ul id="ul"></ul>
  </div>
</div> -->

<div class="center gotham">
  <h2>Vos comptes</h2>
</div>

<?php
$comptes = get_accounts();

foreach ($comptes as $key => $value):

?>

<div class="card" style="width: 18rem;">
  <img class="card-img-top" src="..." alt="Card image cap">
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
    <a href="#" class="card-link">Card link</a>
    <a href="#" class="card-link">Another link</a>
  </div>
</div>

<?php
endforeach
?>


<!-- <script src="public/js/layer.js"></script> -->

<!-- footer -->
<?php
require "template/footer.php";
?>
