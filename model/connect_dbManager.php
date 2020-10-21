<?php
try{
$db = new PDO('mysql:host=localhost;dbname=banque_PHP', 'banquePHP', 'root');
}
catch(PDOException $e){
  print "Erreur !: ".$getMessage()." <br>";
  die();
}
?>
