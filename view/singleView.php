<?php
$site_title = "La Banque non Populaire";
require "view/template/nav.php";
require "view/template/header.php";
  // if not operations show this card
  if (!$operations):
?>

<div class=" p-5 justify-content-md-center center animate__animated animate__bounceInUp">
  <div class="card col-4 p-0">
    <img src="public/img/vide.jpg" class="card-img-top" alt="vide">
    <div class="card-body">
      <h5 class="card-title">Oups !</h5>
      <p class="card-text">Il n'y a pas d'opérations à afficher.</p>
    </div>
    <div class="justify-content-md-center center">
      <a type="button" class="btn btn-primary card-link text-light mb-3 mt-3" style="width: 10rem" id="account_link" href="home.php?param=account">Retour</a>
    </div>
  </div>
</div>

<?php
else:
foreach ($account as $key => $value): ?>

<!-- if operations show this card with detail -->
<h2 class="text-light center starcraft">Votre <?php echo $value->getAccount_type(); endforeach; ?></h2>

<div class="justify-content-md-center center animate__animated animate__bounceInUp p-5">
  <div class="card col-6 mb-5" style="width: 50rem;">
    <div class="card-body">
      <h4 class="card-text center">Opérations effectuées :</h4>
      <?php foreach ($operations as $key => $operation): ?>
      <p class="card-text center"><?php echo $operation->getAmount() . " : " .$operation->getLabel();
      // condition if the lable is NULL, and if the amount is positive or negative
      if ($operation->getLabel()===NULL):
        if ($operation->getAmount() > 0):
          echo "Dépôt";
        elseif ($operation->getAmount() < 0):
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
      <a type="button" class="btn btn-primary card-link text-light mb-3 mt-3" style="width: 10rem" id="account_link" href="home.php?param=account">Retour</a>
    </div>
  </div>
</div>
<?php
endif;
require "view/template/footer.php";
?>