<?php
$msg='';
$msgClass='';
?>


<div class="container">
  <div class="row mt-5">
    <div class="col-md-6 m-auto">
      <h1 class="mb-3">Nain</h1>
      <p class="rounded text-light text-center bg <?php if ($msgClass!=='') { echo $msgClass; }?> pt-1 pb-1"><?php if ($msg!=='') { echo $msg; }?></p>

      <p><strong>Nom : </strong> <?=$nain->getNom()?>.</p>

      <p><strong>Longueur de barbe :</strong> <?= $nain->getBarbe() ?> cm.</p>

      <p><strong>Originaire de : </strong> <a href="?controller=Ville&action=getView&v_id="> <?=$nain->getVille()?></a>.</p>

      <?php if ($nain->getGroupe() !== null): ?>
        <p><strong>Boit dans : </strong> <a href="?controller=Taverne&action=getView&t_id= <?=$taverne->getId() ?>"><?= $taverne->getNom() ?></a>.</p>

        <p>Travaille de <?=$groupe->getDebuttravail()?> à <?= $groupe->getFintravail() ?> dans le tunnel n°<?=$tunnel->getId()?> qui va de (ville depart) à (ville arrivee).</p>

        <p>Membre du <a href="?controller=Group&action=getView&g_id=<?=$nain->getGroupe()?>">groupe n°<?=$nain->getGroupe()?></a></p>
      <?php endif; ?>


      <form class="form" action="<?=PHP_SELF?>" method="GET">
        <div class="form-group">
          <label for="groupe">Assigner le nain à un nouveau groupe :</label>
          <select name="g_id" class="form-control" id="groupe">
        <?php
            foreach ($groupList as $group)
            {
                echo '<option value="'.$group['g_id'].'">'.$group['g_id'].'</option>';
            }
        ?>
          </select>
          <input type="hidden" name="controller" value="Nain">
          <input type="hidden" name="action" value="getView">
          <input type="hidden" name="n_id" value="<?=$nain->getId()?>">

        </div>
        <button type="submit" name="change_group" value="" class="btn btn-primary mb-2">Changer</button>
      </form>
    </div>
  </div>
</div>
