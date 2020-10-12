<?php

function info_user_from_email(PDO $db, string $_POST_data): ?Array {

  $query = $db->prepare(
    "SELECT * FROM User
    WHERE email = :email"
  );

  $execute = $query->execute([
    "email"=>$_POST_data
  ]);

  return $user=$query->fetch(PDO::FETCH_ASSOC);
}

?>
