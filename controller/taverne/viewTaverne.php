<?php
?>

<!-- <body> (dans header.php) -->

<div class="container">
  <div class="row mt-5">
    <div class="col-md-6 m-auto">
      <h1 class="mb-3">Taverne</h1>
      <p>Nom : <?=$nom?>.</p>
      <p>Ville : <?=$ville?>.</p>
      <p>Possède de la bière :</p>
      <ul>
        <?php echo ($tInfo[0]['t_blonde'] == 1) ? $blonde : '' ; ?>
        <?php echo ($tInfo[0]['t_brune'] == 1) ? $brune : '' ; ?>
        <?php echo ($tInfo[0]['t_rousse'] == 1) ? $rousse : '' ; ?>
      </ul>
      <p>La taverne a <?=$chambres?> chambres, dont <?=$chambresLibres?> libres.</p>
    </div>
  </div>
</div>

