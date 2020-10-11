<!-- title -->
<?php $site_title = "La Banque non Populaire"; ?>

<!-- nav and header for all pages-->
<?php
require "data/acounts.php";
require "template/nav.php";
require "template/header.php";
?>

<!-- main -->
<!-- we check that $ _GET returns the account id of index.php -->
<?php
if (!empty($_GET["account_id"]) AND isset($_GET["account_id"])):
  // $account_id = htmlspecialchars($_GET["account_id"]);

  // request to display the operations and some information of an account
  $query = $db->prepare(
    "SELECT a.id AS a_id, a.amount AS a_amount, a.account_type AS account_type, o.id AS o_id, o.operation_type AS operation_type, o.amount AS o_amount, o.label AS o_label
    FROM Account AS a
    INNER JOIN Operation AS o
    ON a.id = o.account_id AND a.id = :account_id"
  );

  $result = $query->execute([
    "account_id"=>$_GET["account_id"]
  ]);

  $operations = $query->fetchAll(PDO::FETCH_ASSOC);

  endif;

  foreach ($operations as $operation => $value):
  endforeach;
  if (!isset($value)):
?>

<div class=" p-5 justify-content-md-center center animate__animated animate__bounceInUp">
  <div class="card col-4 p-0">
    <img src="public/img/vide.jpg" class="card-img-top" alt="vide">
    <div class="card-body">
      <h5 class="card-title">Oups !</h5>
      <p class="card-text">Il n'y a pas d'opérations à afficher.</p>
    </div>
    <div class="justify-content-md-center center">
      <a type="button" class="btn btn-primary card-link text-light mb-3 mt-3" style="width: 10rem" id="account_link" href="index.php?param=account">Retour</a>
    </div>
  </div>
</div>

<?php
else:
?>

<h2 class="text-light center starcraft">Votre <?php echo $value["account_type"]; ?></h2>

<div class="justify-content-md-center center animate__animated animate__bounceInUp">
  <div class="card col-6 mb-5" style="width: 50rem;">
    <div class="card-body">
      <h3 class="card-title">Solde du compte : <?php echo $value["a_amount"] ?></h3>
      <h4 class="card-text center">Opérations effectuées :</h4>

      <?php foreach ($operations as $operation): ?>
      <p class="card-text center"><?php echo $operation["o_amount"]. " : " .$operation["o_label"];
      // condition if the lable is NULL, and if the amount is positive or negative
      if ($operation["o_label"]===NULL):
        if ($operation["o_amount"] > 0):
          echo "Dépôt";
        elseif ($operation["o_amount"] < 0):
          echo "Retrait";
        endif;
      endif;
      ?>
      </p>

      <?php
      endforeach;
      ?>

    </div>
    <div class="center">
      <a type="button" class="btn btn-primary card-link text-light mb-3 mt-3" style="width: 10rem" id="account_link" href="index.php?param=account">Retour</a>
    </div>
  </div>
</div>

<!-- footer -->
<?php
endif;
require "template/footer.php";
?>
