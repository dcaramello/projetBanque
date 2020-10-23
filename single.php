<?php 
require "model/entity/account.php";
require "model/entity/operation.php";
require "model/operationManager.php";
require "model/accountManager.php";

$operationManager = new OperationManager();
$accountManager = new AccountManager();

if (!empty($_GET["account_id"]) AND isset($_GET["account_id"])) {
    // Récupère un objet compte par l'id passé dans l'url
    $account = $accountManager->getAccount($_GET["account_id"]);
    // Récupère les opération du compte par l'id passé dans l'url
    $operations = $operationManager->getOperations($_GET["account_id"]);
}

require "view/singleView.php";

