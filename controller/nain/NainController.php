<?php declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: webuser1801
 * Date: 15/05/2018
 * Time: 13:57
 */
namespace nains\controller\nain;

use nains\controller\coreController;
use nains\model\GroupManager;
use nains\model\HomepageManager;
use nains\model\NainManager;
use nains\model\TaverneManager;
use nains\model\VilleManager;
use nains\model\TunnelManager;

class NainController extends coreController
{
    public function __construct()
    {
        $this->className = 'nain';
    }


    public function getView($id)
    {

        $manager = new HomepageManager();
        $nainManager = new NainManager();
        $taverneManager = new TaverneManager();
        $groupManager = new GroupManager();
        $villeManager = new VilleManager();
        $tunnelManager = new TunnelManager();


        $nainData = $nainManager->getNain((int)$id);
        $origin = $villeManager->getVilleById($nainData->getVille());

        $taverne = $taverneManager->getTaverneById((int)$nainData->getGroupe());

        $groupe = $groupManager->getGroupById($nainData->getGroupe());  // problème avec le progres du tunnel (NULL)
        $groupList = $manager->getListeGroupes();

        $tunnel = $tunnelManager->getTunnelById($groupe->getTunnel());
        $villeDepart = $villeManager->getVilleById($tunnel->getVilledepart());
        $villeArrivee = $villeManager->getVilleById($tunnel->getVillearrivee());

        if (isset($_GET['change_group']))
        {
            $n_id = (int)$_GET['n_id'];
            $g_id = (int)$_GET['g_id'];

            try
            {
              $nainManager->changeGroupNain($n_id, $g_id);
            } catch (\PDOException $e)
              {
                echo $e->getMessage();
              }
        }

        $this->showView($this->className, [
            'nain' => $nainData,
            'nainOrigin' => $origin,
            'groupe' => $groupe,
            'taverne' => $taverne,
            'depart' => $villeDepart,
            'arrivee' => $villeArrivee,
            'groupList' => $groupList,
            'tunnel' => $tunnel
          ]);
        }
} // End of class

/*
    // Reaffichage de la page avec les infos à jour
    $info = getNainInfo($idNain);
    $msg='Changement effectué!';
    $msgClass='bg-success';
}*/
