<?php
/**
 * Created by PhpStorm.
 * User: webuser1801
 * Date: 15/05/2018
 * Time: 13:59
 */

namespace nains\controller\taverne;

use nains\controller\coreController;
use nains\model\TaverneManager;
use nains\model\VilleManager;



class TaverneController extends coreController
{

    public function __construct()
    {
        $this->className = 'taverne';
    }

    public function getView($id)
    {

      $tav_manager = new TaverneManager();
      $v_manager = new VilleManager();


      $taverne = $tav_manager->getTaverneById($id);
      $ville = $v_manager->getVilleById($taverne->getVille());
      $rooms = $tav_manager->availableRooms($id);

        $this->showView($this->className, [
          'taverne' => $taverne,
          'ville' => $ville,
          'rooms' => $rooms
            ]);
    }
}
