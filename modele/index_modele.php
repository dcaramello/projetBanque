<?php

function info_accounts_from_userId(PDO $db, string $_SESSION_id) :? Array {
  
  $query = $db->prepare(
    "SELECT a.id, u.lastname, u.firstname, a.account_type, a.opening_date, a.amount
    FROM User AS u
    INNER JOIN Account AS a
    ON u.id = a.user_id AND u.id = :user_id"
  );

  $result = $query->execute([
    "user_id"=>$_SESSION_id
  ]);

  return $accounts=$query->fetchAll(PDO::FETCH_ASSOC);
}
 ?>
