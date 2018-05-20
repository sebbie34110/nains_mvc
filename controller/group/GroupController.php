<?php declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: webuser1801
 * Date: 15/05/2018
 * Time: 13:54
 */

namespace nains\controller\group;

use nains\controller\coreController;
use nains\model\GroupManager;
use nains\model\HomepageManager;
use nains\model\TaverneManager;
use nains\model\TunnelManager;
use nains\model\VilleManager;

class GroupController extends coreController
{



    public function __construct()
    {
        $this->className = 'group';
    }

    public function getView(int $id)
    {
        $h_manager = new HomepageManager();
        $g_manager = new GroupManager();
        $t_manager = new TaverneManager();
        $tunel_manager = new TunnelManager();
        $v_manager = new VilleManager();



        $group = $g_manager->getGroupById($id);
        $nainsInGroup = $g_manager->getNainsInGroup($id);
        $taverne = $t_manager->getTaverneById((int)$group->getId());
        $tunnel = $tunel_manager->getTunnelById((int)$group->getTunnel());
        $listTavernes = $h_manager->getListeTavernes();
        $startingHours = $g_manager->getStartingHours();
        $finishingHours = $g_manager->getFinishingHours();
        $tunnelList = $tunel_manager->getTunnelList();
        $villeDepart = $v_manager->getVilleById($tunnel->getVilledepart());
        $villeArrivee = $v_manager->getVilleById($tunnel->getVillearrivee());

        if (isset($_GET['update_group'])) {
          // verifier que la taverne ne soit pas full

          

        }







        $this->showView($this->className, [
            'group' => $group,
            'tunnel' => $tunnel,
            'nainList' => $nainsInGroup,
            'villeDepart' => $villeDepart,
            'villeArrivee' => $villeArrivee,
            'taverne' => $taverne,
            'listTavernes' => $listTavernes,
            'startingHours' => $startingHours,
            'finishingHours' => $finishingHours,
            'tunnelList' => $tunnelList
        ]);





    }

    /*if (isset($_GET['g_id'])) {
    $g_id = (int)$_GET['g_id'];

    $infoGroupe = getGroupeInfo($g_id);

    // Liste des nains du group
    $nainsGroupe = '';
    foreach ($infoGroupe as $key) {
    $nainsGroupe .= '<li>' . $key['n_nom'] . '</li>';
    }

    $taverne = "<a href='Taverne.php?t_id=".$infoGroupe[0]['t_id']."'>".$infoGroupe[0]['nomTaverne']."</a>";

    // Recupération des villes de départ/arrivée
    $v_depart = (int)$infoGroupe[0]['t_villedepart_fk'];
    $v_arrivee = (int)$infoGroupe[0]['t_villearrivee_fk'];
    $villes = getVille($v_depart, $v_arrivee);

    $dep = "<a href='ville.php?v_id=".$villes[0]['v_id']."'>".$villes[0]['v_nom']."</a>";
    $arr = "<a href='ville.php?v_id=".$villes[1]['v_id']."'>".$villes[1]['v_nom']."</a>";
    }*/



}
