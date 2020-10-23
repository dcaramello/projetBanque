<!-- title -->
<?php $site_title = "La Banque non Populaire"; ?>

<!-- nav and header for all pages-->
<?php
require "view/template/nav.php";
require "view/template/header.php";
?>

<!-- main with a statistic on the table since statistiques.json -->
<div class="container p-3">
  <div class="center">
    <h2 class="starcraft text-light">Statistiques</h2>
    <p class="mulish font-italic text-light">Suivez l'évolution des taux d'emprunts, du PIB et le cours de la bourse.</p>
  </div>
  <div id="classement">
      <table class="table table-striped mb-0 bg-secondary">
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
require "view/template/footer.php";
?>
