<!-- title -->
<?php $site_title = "La Banque non Populaire"; ?>

<!-- nav and header for all pages-->
<?php
require "template/nav.php";
require "template/header.php";
?>

<!-- main with a statistic on the table since statistiques.json -->
<div class="container">
  <div class="center">
    <h2 class="gotham">Statistiques</h2>
    <p class="mulish font-italic">Suivez l'évolution des taux d'emprunts, du PIB et le cours de la bourse.</p>
  </div>
  <div id="classement">
      <table class="table table-striped">
        <thead>
          <tr>
            <th scope="col">Année</th>
            <th scope="col">Taux</th>
            <th scope="col">PIB</th>
            <th scope="col">CAC40</th>
          </tr>
        </thead>
        <tbody id="table"></tbody>
      </table>
  </div>
</div>

<script src="public/js/statistiques.js"></script>

<!-- footer -->
<?php
require "template/footer.php";
?>
