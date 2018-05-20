<div class="container">
  <div class="row mt-5">
    <div class="col-md-6 m-auto">
      <h1 class="mb-3">Ville</h1>

      <p><strong>Nom :</strong> <?= $ville->getNom() ?></p>

      <p><strong>Superficie :</strong> <?= $ville->getSuperficie() ?> km²</p>

      <div class="liste_nains">
        <p><strong>Nains originaires de cette ville :</strong> </p>
        <ul>
          <?php foreach($nainsInVille as $nain) { ?>
            <li><a href='?controller=Nain&action=getView&n_id=<?= $nain->getId() ?>'><?= $nain->getNom() ?></a></li>
          <?php } ?>
        </ul>
      </div>

      <div class="liste_tavernes">
        <p><strong>Tavernes de la ville :</strong></p>
        <ul>
          <?php foreach($tavernes as $tav) { ?>
            <li><a href='?controller=Taverne&action=getView&t_id=<?= $tav->getId() ?>'><?= $tav->getNom() ?></a></li>
          <?php } ?>
        </ul>
      </div>

      <div class="liste_tunnels">
        <p><strong>Tunnels :</strong></p>
        <ul>
          <?php foreach($tunnels as $tun) { ?>
            <li><a href='?controller=Tunnel&action=getView&t_id=<?= $tun->getId() ?>'>Tunnel n°<?= $tun->getId() ?> : </a><?= $tun->getProgres()==100 ? 'ouvert' : $tun->getProgres().'% terminé' ?></li>
          <?php } ?>
        </ul>
      </div>

    </div>
  </div>
</div>
