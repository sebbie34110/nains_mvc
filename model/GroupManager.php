<?php declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: webuser1801
 * Date: 15/05/2018
 * Time: 14:01
 */

namespace nains\model;

use nains\model\entities\Nain;

class GroupManager extends HomepageManager
{

  public function updateGroupInfo($data) : void
  {

    // $sql = 'UPDATE `nain` SET `n_groupe_fk`= '.$g_id.' WHERE `n_id` = '.$n_id;
    //
    // DBManager::getInstance()->makeUpdate($sql);

  }


    /**
     * @return array|null
     */
    public function getListeGroupes() : ? array
    {

        $sql = 'SELECT `g_id` FROM `groupe` ORDER BY `g_id` ASC';

        return DBManager::getInstance()->makeSelect($sql);

    }


    /**
     * @return array|null
     */
    public function getStartingHours() : ? array
    {
        $sql = 'SELECT `g_debuttravail` AS debut FROM `groupe` GROUP BY `g_debuttravail` ORDER BY `g_debuttravail` ASC';

        return DBManager::getInstance()->makeSelect($sql);
    }


    /**
     * @return array|null
     */
    public function getFinishingHours() : ? array
    {
        $sql = 'SELECT `g_fintravail` AS fin FROM `groupe` GROUP BY `g_fintravail` ORDER BY `g_fintravail` ASC';

        return DBManager::getInstance()->makeSelect($sql);
    }


    public function getGroupById(int $id) : entities\Group
    {
        $sql = 'SELECT `g_id` AS `id`, `g_debuttravail` AS `debuttravail` , `g_fintravail` AS `fintravail`, `g_taverne_fk` AS `taverne`, `g_tunnel_fk` AS `tunnel`
        FROM `groupe`
        WHERE `g_id`= :id';

        $data = DBManager::getInstance()->makeSelect($sql, [':id' => $id]);

        return new entities\Group($data[0]);
    }

    /**
     * @param int $id
     * @return array
     */
    public function getNainsInGroup(int $id) : array
    {
      $list = [];
      $m = new NainManager();


      $sql = 'SELECT `n_id` FROM `nain` LEFT JOIN `groupe` ON `n_groupe_fk` = `g_id` WHERE `g_id` = :id';

      $data = DBManager::getInstance()->makeSelect($sql, [':id' => $id]);


      foreach ($data as $key => $nain) {

          $list[] = $m->getNain((int)$nain['n_id']);

      }
      return $list;
    }
} // End of class
