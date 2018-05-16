<?php
$msg='';
$msgClass='';
?>


<div class="container">
  <div class="row mt-5">
    <div class="col-md-6 m-auto">
      <h1 class="mb-3">Nain</h1>
      <p class="rounded text-light text-center bg <?php if ($msgClass!=='') { echo $msgClass; }?> pt-1 pb-1"><?php if ($msg!=='') { echo $msg; }?></p>

      <p>nom : <?= $info[0]['n_nom'] ?>.</p>

      <p>Longueur de barbe : <?= $info[0]['n_barbe'] ?> cm.</p>

      <p>Originaire de :  <a href="ville.php?v_id=<?=$info[0]['v_id']?>"> <?=$info[0]['v_nom']?> </a>.</p>

      <?php if ($info[0]['g_id'] !== null): ?>
        <p>Boit dans : <a href="../taverne/viewTaverne.php?t_id=<?= $info[0]['t_id']?>"><?= $info[0]['t_nom']?></a>.</p>

        <p>Travaille de <?=$info[0]['g_debuttravail']?> à <?= $info[0]['g_fintravail'] ?> dans le tunnel de <?=$depart?> à <?=$arrivee?>.</p>

        <p>Membre du <a href="groupe.php?g_id=<?=$info[0]['g_id']?>">groupe n°<?=$info[0]['g_id']?></a></p>
      <?php endif; ?>


      <form class="form" action=" <?= $_SERVER['PHP_SELF'] ?> " method="GET">
        <div class="form-group">
          <label for="groupe">Assigner le nain à un nouveau groupe :</label>
          <select name="groupe" class="form-control" id="groupe">
            <?=$listeGroupes?>
          </select>
          <input type="hidden" name="id_nain" value="<?=$idNain?>">

        </div>
        <button type="submit" name="change_groupe" value="" class="btn btn-primary mb-2">Changer</button>
      </form>
    </div>
  </div>
</div>

