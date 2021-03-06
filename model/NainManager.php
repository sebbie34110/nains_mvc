<?php declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: webuser1801
 * Date: 15/05/2018
 * Time: 14:01
 */

namespace nains\model;

use nains\model\entities;



class NainManager extends HomepageManager
{

    /**
     * Récupération de la liste des nains
     * @return array
     */
    public function getListeNains() : array
    {
       $nains = [];

        $sql = 'SELECT `n_id` as `id`, `n_nom` as `nom`, `n_barbe` as `barbe`, `n_groupe_fk` as `groupe`, `n_ville_fk` as `ville` FROM `nain` ORDER BY `n_id` ASC';

        $data = DBManager::getInstance()->makeSelect($sql);

        foreach ($data as $nain) {
            $nains[] =new entities\Nain($nain);
        }

        return $nains;
    }


    /**
     * @param int $id
     * @return object
     */
    public function getNain(int $id) {


            $sql = 'SELECT `n_id` AS `id`, `n_nom` AS `nom`, `n_barbe` AS `barbe`, `v_id` AS `ville`, `n_groupe_fk` AS `groupe`
                    FROM `nain`
                    LEFT JOIN `ville` ON `n_ville_fk` = `v_id`
                    WHERE `n_id`= :id';

            $data = DBManager::getInstance()->makeselect($sql, ['id' => $id]);

           return new entities\Nain($data[0]);
    }


    /**
     * @param int $v_id
     * @return array
     */
    public function getNainsInVille(int $v_id) : array{

          $nains = [];


            $sql = 'SELECT `n_id` AS `id`, `n_nom` AS `nom`, `n_barbe` AS `barbe`, `v_nom` AS `ville`, `n_groupe_fk` AS `groupe`
                    FROM `nain`
                    LEFT JOIN `ville` ON `n_ville_fk` = `v_id`
                    WHERE `v_id`= :id';

            $data = DBManager::getInstance()->makeselect($sql, ['id' => $v_id]);

            foreach($data as $key => $nain){
              $nains[] = new entities\Nain($nain);
            }

           return $nains ;
    }


    public function getVilleDepart(int $id) : entities\Ville
    {
        $sql = 'SELECT v_id AS `id`, v_nom AS `nom`, `v_superficie` as `superficie`
              FROM ville
              INNER JOIN tunnel ON v_id = t_villedepart_fk
              INNER JOIN groupe ON t_id = g_tunnel_fk
              WHERE g_id = :id';

        $data = DBManager::getInstance()->makeSelect($sql, ['id' => $id]);

        return new entities\Ville($data);
    }



    public function getVilleArrivee(int $id) : entities\Ville
    {
        $sql = 'SELECT `v_id` AS `id`, `v_nom` AS `nom`, `v_superficie` as `superficie`
              FROM ville
              INNER JOIN tunnel ON v_id = t_villearrivee_fk
              INNER JOIN groupe ON t_id = g_tunnel_fk
              WHERE g_id = :id';

        $data = DBManager::getInstance()->makeSelect($sql, ['id' => $id]);

        return new entities\Ville($data);
    }



    /**
     * Changer le nain de group
     * @param int $id     [description]
     * @param int $groupe [description]
     */
     public function changeGroupNain( int $n_id, int $g_id) : void
     {

       $sql = 'UPDATE `nain` SET `n_groupe_fk`= '.$g_id.' WHERE `n_id` = '.$n_id;

       DBManager::getInstance()->makeUpdate($sql);

     }
} // End of class
