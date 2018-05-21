<?php
?>

<!-- <body> (dans header.php) -->

<div class="container">
  <div class="row mt-5">
    <div class="col-md-6 m-auto">
      <h1 class="mb-3">Taverne</h1>
      <p><strong>Nom :</strong> <?=$taverne->getNom()?></p>
      <p><strong>Ville :</strong> <a href="?controller=Ville&action=getView&v_id=<?=$ville->getId()?>"><?=$ville->getNom()?></a> </p>
      <p><strong>Bières disponibles :</strong> </p>
      <ul>
        <?php
      echo  $taverne->getBlonde() == 1 ? '<li>Blonde</li>' : '';
      echo  $taverne->getBrune() == 1 ? '<li>Brune</li>' : '';
      echo  $taverne->getRousse() == 1 ? '<li>Rousse</li>' : '';
        ?>
      </ul>
      <p>La taverne a <?=$taverne->getChambres()?> chambres, dont <?=$rooms['chambresLibres']?> libres.</p>
    </div>
  </div>
</div>
