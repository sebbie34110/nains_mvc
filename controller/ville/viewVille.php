<?php


?>

<!-- <body> (dans header.php) -->

<div class="container">
  <div class="row mt-5">
    <div class="col-md-6 m-auto">
      <h1 class="mb-3">Ville</h1>
      <p>Nom : <?= $ville ?></p>
      <p>Superficie : <?= $superficie ?> km²</p>
      <div class="liste_nains">
        <p>Nains originaires de cette ville :</p>
        <ul>
          <?= $listeNains ?>
        </ul>
      </div>
      <div class="liste_tavernes">
        <p>Tavernes de la ville :</p>
        <!-- Liste des tavernes de la ville dans des liens -->
        <ul>
          <?= $listeTavernes?>
        </ul>

      </div>
      <div class="liste_tunnels">
        <p>Tunnels :</p>
        <ul>
          <?=$progresListe?>
        </ul>
      </div>
    </div>
  </div>
</div>
