<?php

if (!empty($_GET["account_id"]) AND isset($_GET["account_id"])):

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
