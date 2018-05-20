<?php
/**
 * Created by PhpStorm.
 * User: webuser1801
 * Date: 15/05/2018
 * Time: 14:00
 */

namespace nains\controller\ville;


use nains\controller\coreController;
use nains\model\VilleManager;
use nains\model\NainManager;
use nains\model\TaverneManager;
use nains\model\TunnelManager;



class VilleController extends coreController
{
    public function __construct()
    {
        $this->className = 'ville';
    }

    public function getView($id)
    {
      $id = (int)$id;

      $v_manager = new VilleManager();
      $n_manager = new NainManager();
      $tav_manager = new TaverneManager();
      $tun_manager = new TunnelManager();

      $ville = $v_manager->getVilleById($id);
      $nainsInVille = $n_manager->getNainsInVille($id);
      $tavernesInVille = $tav_manager->getTavernesInVille($id);
      $tunnelInCity = $tun_manager->getTunnelsInVille($id);

      $this->showView($this->className, [
        'ville' => $ville,
        'nainsInVille' => $nainsInVille,
        'tavernes' => $tavernesInVille,
        'tunnels' => $tunnelInCity
      ]);
    }
}
