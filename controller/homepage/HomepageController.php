<?php
/**
 * Created by PhpStorm.
 * User: webuser1801
 * Date: 15/05/2018
 * Time: 13:56
 */

namespace nains\controller\homepage;

use nains\controller\coreController;
use nains\model\HomepageManager;
use nains\model\NainManager;

class HomepageController extends coreController
{

    public function __construct()
    {
        $this->className = 'homepage';
    }


    public function getView()
    {
        // recupère toutes les listes (nains, tavernes, etc)
        // passe les variables à la view sous forme d'un tableau

        $manager = new HomepageManager();

        $variables = [
            'tavernes' => $manager->getListeTavernes(),
            'villes' => $manager->getListeVilles(),
            'nains' => $manager->getListeNains(),
            'groups' => $manager->getListeGroupes()
        ];

        $this->showView('homeView', $variables);
    }
}