<div class="container">
  <div class="row mt-5">
    <div class="col-md-6 m-auto">
      <?php if (!empty($msg)): ?>
        <p><?$msg?></p>
      <?php endif; ?>

      <h1 class="mb-3">Groupe</h1>
      <p>Groupe n°<?=$group->getId()?></p>

      <div class="liste_nains">
        <p>Nains du groupe :</p>
        <ul>
        <?php foreach ($nainList as $nain){ ?>
          <li><a href='?controller=Nain&action=getView&n_id=<?=$nain->getId()?>'><?=$nain->getNom()?></a></li>
        <?php }?>
        </ul>
      </div>

      <p>Boivent dans <a href='?controller=Taverne&action=getView&t_id=<?=$taverne->getId()?>'><?=$taverne->getNom()?></a>.</p>

      <p><?= $tunnel->getProgres() == '100' ? 'Entretiennent' : 'Creusent'?> de <?=$group->getDebuttravail()?> à <?=$group->getFintravail()?> le tunnel n°<?=$group->getTunnel()?> qui va de <a href="?controller=Ville&action=getView&v_id=<?=$villeDepart->getId()?>"><?=$villeDepart->getNom()?></a> à <a href="?controller=Ville&action=getView&v_id=<?=$villeArrivee->getId()?>"><?=$villeArrivee->getNom()?></a> (<?=$tunnel->getProgres()?>% terminé).</p>


        <h4 class="mt-3">Modifier le groupe:</h4>


        <form class="form" action=" <?= $_SERVER['PHP_SELF'] ?> " method="GET">

        <div class="form-group">
          <label for="debut_travail">Heure de début de travail :</label>
          <select name="debut_travail" class="form-control" id="debut_travail">
            <?php foreach ($startingHours as $key => $hour){ ?>
                <option <?= $hour['debut'] == $group->getDebuttravail() ? 'SELECTED' : '' ?> value="<?=$hour['debut']?>"><?=$hour['debut']?></option>
            <?php } ?>
          </select>
        </div>


        <div class="form-group">
          <label for="fin_travail">Heure de fin de travail :</label>
          <select name="fin_travail" class="form-control" id="fin_travail">
            <?php foreach ($finishingHours as $key => $hour){ ?>
                <option <?= $hour['fin'] == $group->getFintravail() ? 'SELECTED' : '' ?> value="<?=$hour['fin']?>"><?=$hour['fin']?></option>
            <?php } ?>
          </select>
        </div>


        <div class="form-group">
          <label for="tunnel">Changer de tunnel</label>
          <select name="tunnel" class="form-control" id="tunnel">
            <?php foreach ($tunnelList as $key => $tunnel){ ?>
                <option <?= $tunnel['id'] == $group->getTunnel() ? 'SELECTED' : '' ?> value="<?=$tunnel['id']?>"><?=$tunnel['id']?></option>
            <?php } ?>
          </select>
        </div>


        <div class="form-group">
          <label for="taverne">Changer de taverne</label>
          <select name="taverne" class="form-control" id="taverne">
              <?php foreach ($listTavernes as $tav){ ?>
                  <option <?= $tav['t_nom'] !== $taverne->getNom() ? '' : 'SELECTED' ?> value="<?=$tav['t_id']?>"><?=$tav['t_nom']?></option>
              <?php } ?>
          </select>
        </div>


        <input type="hidden" name="g_id" value="<?=$group->getId()?>">
        <button type="submit" name="update_group" value="" class="btn btn-primary">Changer</button>


      </form>
    </div>
  </div>
</div>
