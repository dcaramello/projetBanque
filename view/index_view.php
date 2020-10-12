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
    <div class="card col- col-sm-4 col-lg-3 m-5 mb-5 animate__animated animate__bounceInLeft" style="width: 18rem;">
      <img class="card-img-top pt-3" src="public/img/money.jpg" alt="money_picture">
      <div class="card-body">
        <h3 class="card-title"><?php echo $account["lastname"]." ".$account["firstname"]; ?></h3>
        <h5 class="card-title"><?php echo $account["account_type"]; ?></h5>
        <p class="card-text">Date d'ouverture : <?php echo $account["opening_date"]; ?></p>
      </div>
      <ul class="list-group list-group-flush">
        <li class="list-group-item">Solde : <?php echo $account["amount"]; ?></li>
      </ul>
      <!-- by clicking we retrieve the account id -->
      <div class="card-body">
        <a name="" type="button" class="btn btn-primary card-link text-light m-1" id="account_link"
          href="compte.php<?php echo '?account_id='.$account["id"];?>">Voir le compte
        </a>
        <form class="" action="index.html" method="POST">
          <a name="delete" type="button" class="btn btn-danger card-link text-light m-1" id="account_link"
            href="delete_account.php<?php echo '?account_id='.$account["id"];?>">Supprimer le compte
          </a>
        </form>
      </div>
    </div>
  <?php
endforeach;

?>
</div>
