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
  header("location: home.php");
endif;
?>