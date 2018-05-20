<?php
/**
 * Created by PhpStorm.
 * User: webuser1801
 * Date: 15/05/2018
 * Time: 15:08
 */

namespace nains\model;


use nains\model\entities\Tunnel;

class TunnelManager extends HomepageManager
{

  public function getTunnelList() : array
  {
    $sql = 'SELECT `t_id` AS id FROM `tunnel` ORDER BY `t_id` ASC';

    return DBManager::getInstance()->makeSelect($sql);
  }


    /**
     * @param int $id
     * @return Tunnel
     */
    public function getTunnelById(int $id) : Tunnel
    {

        $sql = 'SELECT `t_id` AS `id`, `t_progres` as `progres`, `t_villedepart_fk` AS `villedepart`, `t_villearrivee_fk` AS `villearrivee`
                FROM `tunnel`
                WHERE `t_id` = :id';

        $data = DBManager::getInstance()->makeSelect($sql, [':id' => $id]);

        return new Tunnel($data[0]);
    }




    public function getTunnelsInVille(int $v_id) : array
    {
      $tunnels = [];

      $sql = 'SELECT `t_id` AS `id`, `t_progres` as `progres`, `t_villedepart_fk` AS `villedepart`, `t_villearrivee_fk` AS `villearrivee` FROM `tunnel` LEFT JOIN `ville` ON `v_id` = `t_villedepart_fk` WHERE `t_villearrivee_fk` = :id OR `t_villedepart_fk` = :id ;';

      $data = DBManager::getInstance()->makeSelect($sql, [':id' => $v_id]);

      foreach($data as $key => $tunnel){
        $tunnels[] = new Tunnel($tunnel);
      }

      return $tunnels;
    }



}
