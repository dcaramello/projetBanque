<!-- title -->
<?php $site_title = "La Banque non Populaire"; ?>

<!-- nav and header for all pages-->
<?php
require "data/acounts.php";
require "template/nav.php";
require "template/header.php";
?>

<!-- main -->

<?php
if (!empty($_GET) AND isset($_GET["param"])) {
  $key = htmlspecialchars($_GET["param"]);
  $compte = get_accounts()[$key];
  if (isset($compte)) {
?>

<h2 class="text-light center starcraft">Votre <?php echo ($compte["name"]); ?></h2>

<div class="justify-content-md-center center">
  <div class="card col-6 mb-5" style="width: 50rem;">
    <div class="card-body">
      <h5 class="card-title center"> Compte : <?php echo ($compte["name"]); ?></h5>
      <p class="card-text center">Numéro : <?php echo ($compte["number"]); ?></p>
    </div>
    <ul class="list-group list-group-flush">
      <li class="list-group-item">Propriétaire : <?php echo ($compte["owner"]); ?></li>
      <li class="list-group-item">Solde : <?php echo ($compte["amount"]); ?></li>
      <li class="list-group-item">Derniére opération : <?php echo ($compte["last_operation"]); ?></li>
    </ul>
    <div class="center">
      <a type="button" class="btn btn-primary card-link text-light mb-3 mt-3" style="width: 10rem" id="account_link" href="index.php?param=account">Retour</a>
    </div>
  </div>
</div>

<?php
}}
?>


<!-- footer -->
<?php
require "template/footer.php";
?>
