<!-- title -->
<?php $site_title = "La Banque non Populaire"; ?>

<!-- nav and header for all pages-->
<?php
require "template/nav.php";
require "template/header.php";
?>

<!-- main -->
<?php

// if click on yes, the account is deleted and return to index, if not return index
if(!empty($_POST) && isset($_POST["oui"])):
  // request to delete the account line in account
  $query = $db->prepare(
    "DELETE FROM Account
    WHERE id = :account_id"
  );

  $result = $query->execute([
    "account_id"=>$_GET["account_id"]
  ]);

  header("location: index.php");
endif;

?>

<div class=" p-5 justify-content-md-center center animate__animated animate__bounceInUp">
  <div class="card col-4 p-0">
    <img src="public/img/delete.png" class="card-img-top p-2" alt="delete">
    <div class="card-body">
      <p class="card-text">Etes vous sur de vouloir supprimer ce compte ?</p>
    </div>

    <form class="p-5 justify-content-md-center" action="" method="POST">
      <div class="">
        <input name="oui" type="submit" class="btn btn-danger card-link text-light mb-3 mt-3" style="width: 10rem" id="account_link" value="Oui">
        <a type="button" class="btn btn-primary card-link text-light mb-3 mt-3" style="width: 10rem" id="account_link" href="index.php?param=account">Non</a>
      </div>
    </form>

  </div>
</div>


<!-- footer -->
<?php
require "template/footer.php";
?>
