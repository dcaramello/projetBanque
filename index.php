<?php
$site_title = "La Banque non Populaire";
require "view/template/nav.php";
require "view/template/header.php";
require "modele/index_modele.php";

$accounts = info_accounts_from_userId($db, $_SESSION["user"]["id"]);

?>

<!-- footer -->
<?php

$script = "<script src='public/js/layer.js'></script>";
require "view/index_view.php";
require "view/template/footer.php";
?>
