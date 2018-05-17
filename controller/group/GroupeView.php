<?php



?>

<div class="container">
  <div class="row mt-5">
    <div class="col-md-6 m-auto">
      <h1 class="mb-3">Groupe</h1>
      <p>Groupe n°<?=$infoGroupe[0]['g_id']?></p>
      <div class="liste_nains">
        <p>Nains du groupe :</p>
        <ul>
          <?= $nainsGroupe ?>
        </ul>
      </div>
      <p>Boivent dans <?=$taverne?>.</p>
      <p><?php if($infoGroupe[0]['t_progres'] == '100'){echo 'Entretiennent';}else { echo 'Creusent';}?> de <?=$infoGroupe[0]['g_debuttravail']?> à <?=$infoGroupe[0]['g_fintravail']?> le tunnel de <?=$dep?> à <?=$arr?> (<?=$infoGroupe[0]['t_progres']?>% terminé).</p>

      <h4 class="mt-3">Modifier le groupe:</h4>
      <form class="form" action=" <?= $_SERVER['PHP_SELF'] ?> " method="GET">
        <div class="form-group">
          <label for="debut_travail">Heure de début de travail :</label>
          <select name="debut_travail" class="form-control" id="debut_travail">
            <?=$heuresDebut?>
          </select>
        </div>
        <div class="form-group">
          <label for="fin_travail">Heure de fin de travail :</label>
          <select name="fin_travail" class="form-control" id="fin_travail">
            <?=$heuresFin?>
          </select>
        </div>
        <div class="form-group">
          <label for="tunnel">Changer de tunnel</label>
          <select name="tunnel" class="form-control" id="tunnel">
            <?=$tunnelListe?>
          </select>
        </div>
        <div class="form-group">
          <label for="taverne">Changer de taverne</label>
          <select name="taverne" class="form-control" id="taverne">
              <?= $taverneListe ?>
          </select> <!-- /Refuser le changement si la taverne n'a pas assez de place  -->
        </div>
        <input type="hidden" name="g_id" value="<?=$g_id?>">
        <button type="submit" name="submit" value="" class="btn btn-primary">Changer</button>
      </form>
    </div>
  </div>
</div>

