<?php

class UserModel
{
  private $db;

  public function __construct(){
    $this->db = new PDO('mysql:host=localhost;dbname=banque_PHP', 'banquePHP', 'root');
  }

  public function getUserByEmail(string $_POST_data): ?Array {

    $query = $this->db->prepare(
      "SELECT * FROM User
      WHERE email = :email"
    );

    $execute = $query->execute([
      "email"=>$_POST_data
    ]);

    return $user=$query->fetch(PDO::FETCH_ASSOC);
  }
}

