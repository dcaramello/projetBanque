<!-- title -->
<?php $site_title = "La Banque non Populaire"; ?>

<!-- nav and header for all pages-->
<!-- and acounts.php -->
<?php
require "view/template/nav.php";
require "view/template/header.php";
?>
<h2 class="starcraft center text-light">Nouveau compte</h2>
<div class="row justify-content-md-center">

<!-- account creation form -->
<form class="text-light center col- col-lg-4 " action="new_account.php" method="post">
  <div>
    <p class="center">Montant</p>
    <input type="number" name="amount">
  </div>
  <div class="mt-3">
    <p class="center">Type de compte</p>
    <select name="account_type">
      <option value="compte courant">Compte courant</option>
      <option value="Livret A">Livret A</option>
      <option value="Livret A">PEL</option>
    </select>
  </div>
  <div>
    <input class="btn btn-success mt-5" type="submit" name="new_account" value="Envoyer">
  </div>
</form>

<?php

// if you click on create and the amount is greater than 50, the account is created and displayed
// the account is created with the input of the form, the user ID is retrieved from the session
if(!empty($_POST) && isset($_POST["new_account"])):
  if ($_POST["amount"] > 50):
  $new_account = array_map("htmlspecialchars", $_POST);

  $query = $db -> prepare(
      "INSERT INTO Account(amount, opening_date, account_type, user_id)
      VALUES(:amount, NOW(), :account_type, :user_id)"
    );

    $result = $query -> execute([
      "amount"=>$_POST["amount"],
      "account_type"=>$_POST["account_type"],
      "user_id"=>$_SESSION["user"]["id"]
    ]);


  // Send the query to mysql
  $query = $db -> query("SELECT * FROM account");
  // Extract data from the query as an associative array
  $accounts = $query -> fetchAll(PDO::FETCH_ASSOC);
  ?>

  <div class="col- col-lg-4 center animate__animated animate__bounceIn">
    <div>
      <h4 class="starcraft text-light">Votre compte</h4>
    </div>
    <div id="account" class="card" style="width: 18rem;">
      <img class="card-img-top pt-3" src="public/img/money.jpg" alt="money_picture">
      <div class="card-body">
        <h5 class="card-title">Compte : <?php echo $new_account["account_type"]; ?></h5>
      </div>
      <ul class="list-group list-group-flush">
        <li class="list-group-item">Montant : <?php echo $new_account["amount"]; ?></li>
      </ul>
    </div>
  </div>

<?php
  endif;
endif;
?>
</div>
<div class="center mt-5 pb-5">
  <a type="button" class="btn btn-primary" href="index.php">Retour</a>
</div>

<?php
require "view/template/footer.php";
?>
