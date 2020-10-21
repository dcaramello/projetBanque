<?php

$site_title = "La Banque non Populaire";
require "view/template/nav.php";
require "view/template/header.php";
require "model/accountManager.php";

$accountModel = new AccountModel();

$accounts = $accountModel->getAccountByUserId($db, $_SESSION["user"]["id"]);


$script = "<script src='public/js/layer.js'></script>";
require "view/homeView.php";
require "view/template/footer.php";

