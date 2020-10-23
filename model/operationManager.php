<?php

class OperationManager{

  private $db;

  public function __construct(){
    $this->db = new PDO('mysql:host=localhost;dbname=banque_PHP', 'banquePHP', 'root');
  }

  public function getOperations($data) {

    $query = $this->db->prepare(
      "SELECT * FROM operation
      WHERE account_id = :account_id"
    );

    $result = $query->execute([
      "account_id"=>$data
    ]);

    // return $query->fetchAll(PDO::FETCH_ASSOC);
    return $query->fetchAll(PDO::FETCH_CLASS, "Operation");
  }
}
    

  // public function getOperationByAccountId(array $data):? Array {
  //   // request to display the operations and some information of an account
  //   $query = $this->db->prepare(
  //     "SELECT a.id AS id, a.amount AS amount, a.account_type AS account_type, o.id AS o_id, o.operation_type AS operation_type, o.amount AS o_amount, o.label AS o_label
  //     FROM Account AS a
  //     INNER JOIN Operation AS o
  //     ON a.id = o.account_id AND a.id = :account_id"
  //   );

  //   $result = $query->execute([
  //     "account_id"=>$data["account_id"]
  //   ]);

    // $account_detail = $query->fetchAll(PDO::FETCH_ASSOC);

    // $account = new Account($account_detail[0]);
    // $operations = [];
    // foreach ($account_detail as $key => $operation) {
    //   array_push($operations, new Operation($operation));
    // }
    // $account->operations = $operations;

    // var_dump($account);

    // return $account_detail;
  // }              


