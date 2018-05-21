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

        //var_dump($group->getId());

        if (isset($_GET['update_group']))
        {
            $startingHour = $_GET['debut_travail'];
            $finishingHour = $_GET['fin_travail'];
            $newTunnel = (int)$_GET['tunnel'];
            $newTaverne = (int)$_GET['taverne'];

            $countNainInGroup = $g_manager->countNainsInGroup($group->getId());
            $availableRooms = $t_manager->availableRooms((int)$newTaverne);

            if ($countNainInGroup > $availableRooms)
            {
              echo "Il n'y a pas assez de place dans la taverne.";
            } else
              {
                try
                {
                  $g_manager->updateGroupInfo($group->getId(), $startingHour, $finishingHour, $newTunnel, $newTaverne);
                } catch (PDOException $e)
                  {
                    echo "error:" . $e->getMessage();
                  }
              }
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
} // End of class
