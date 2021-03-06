<?php declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: webuser1801
 * Date: 15/05/2018
 * Time: 14:01
 */

namespace nains\model;

use nains\model\entities\Taverne;

class TaverneManager extends HomepageManager
{

    /**
     * @param int $v_id
     * @return array|null
     */
    public function getTavernesInVille(int $v_id) : ? array
    {
      $tavernes = [];

      $sql = 'SELECT `t_id` AS `id`, `t_nom` as `nom`, `t_chambres` AS `chambres`, `t_blonde` AS `blonde`,
              `t_brune` AS `brune`, `t_rousse` AS `rousse`, `t_ville_fk` AS `ville` FROM `taverne` INNER JOIN `ville` ON `t_ville_fk` = `v_id` WHERE `v_id` = :v_id';

      $data = DBManager::getInstance()->makeSelect($sql, [':v_id' => $v_id]);

      foreach($data as $key => $taverne){
        $tavernes[] = new Taverne($taverne);
      }

      return $tavernes;
    }


    /**
     * @param int $id
     * @return Taverne
     */
    public function getTaverneById(int $id) : Taverne
    {

        $sql = 'SELECT `t_id` AS `id`, `t_nom` as `nom`, `t_chambres` AS `chambres`, `t_blonde` AS `blonde`,
                `t_brune` AS `brune`, `t_rousse` AS `rousse`, `t_ville_fk` AS `ville`
                FROM `taverne`
                WHERE `t_id` = :id';

        $data = DBManager::getInstance()->makeSelect($sql, [':id' => $id]);

        return new Taverne($data[0]);
    }


    /**
     * infos sur la taverne pour la page Taverne.php
     * @param  int   $t_id [description]
     * @return array       [description]
     */
    public function availableRooms(int $id) : array {
      $sql = 'SELECT `t_chambres` - COUNT(`n_id`) AS `chambresLibres`
              FROM `taverne`
              LEFT JOIN `ville` ON `t_ville_fk` = `v_id`
              LEFT JOIN `groupe` ON `t_id`=`g_taverne_fk`
              LEFT JOIN `nain` ON `g_id`=`n_groupe_fk`
              WHERE `t_id` = :id
              GROUP BY `t_id`;';

        $data = DBManager::getInstance()->makeSelect($sql, [':id' => $id]);

      return $data[0];
    }
}
