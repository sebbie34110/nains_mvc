<?php
$msg='';
$msgClass='';
?>


<div class="container">
  <div class="row mt-5">
    <div class="col-md-6 m-auto">
      <h1 class="mb-3">Nain</h1>
      <p class="rounded text-light text-center bg <?php if ($msgClass!=='') { echo $msgClass; }?> pt-1 pb-1"><?php if ($msg!=='') { echo $msg; }?></p>

      <p>nom : <?=$nain->getNom()?>.</p>

      <p>Longueur de barbe : <?= $nain->getBarbe() ?> cm.</p>

      <p>Originaire de :  <a href="?controller=Ville&action=getView&v_id="> <?=$nain->getVille()?></a>.</p>

      <?php if ($nain->getGroupe() !== null): ?>
        <p>Boit dans : <a href="?controller=Taverne&action=getView&t_id=<?= $taverne->getId() ?>"><?= $taverne->getNom() ?></a>.</p>

        <p>Travaille de <?=$groupe->getDebuttravail()?> à <?= $groupe->getFintravail() ?> dans le tunnel de <?=$depart->getNom()?> à <?=$arrivee->getNom()?>.</p>

        <p>Membre du <a href="?controller=Group&action=getView&g_id=<?=$nain->getGroupe()?>">groupe n°<?=$nain->getGroupe()?></a></p>
      <?php endif; ?>


      <form class="form" action=" <?= $_SERVER['PHP_SELF'] ?> " method="GET">
        <div class="form-group">
          <label for="groupe">Assigner le nain à un nouveau groupe :</label>
          <select name="groupe" class="form-control" id="groupe">
        <?php
            foreach ($groupList as $group)
            {
                echo '<option><a href="?controller=Groupe&action=getView&g_id='.$group['g_id'].'"></a>'.$group['g_id'].'</option>';
            }
        ?>
          </select>
          <input type="hidden" name="id_nain" value="<?=$nain->getNom()?>">

        </div>
        <button type="submit" name="change_groupe" value="" class="btn btn-primary mb-2">Changer</button>
      </form>
    </div>
  </div>
</div>

