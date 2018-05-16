<?php declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: webuser1801
 * Date: 15/05/2018
 * Time: 14:02
 */

namespace nains\model;


class VilleManager extends CoreManager
{


    /**
     * @return array
     */
    public function getListeVilles() : array
    {

            $sql = 'SELECT `v_id`, `v_nom` FROM `ville` ORDER BY `v_id` ASC;';

            return DBManager::getInstance()->makeSelect($sql);

    }



    /**
     * @param int $v_id
     * @return array
     */
    public function getVilleInfo(int $v_id) : ? array {


            $sql = 'SELECT `ville`.*, `n_nom` FROM `ville` INNER JOIN `nain` ON `v_id` = `n_ville_fk` WHERE `v_id` = :v_id';

            return DBManager::getInstance()->makeSelect($sql, [':v_id', $v_id]);

    }


    /**
     * @param int $id
     * @return array
     */
    public function getVilleDepartArrivee(int $id) : array {

            $sql = "SELECT v_nom AS departArrivee, v_id AS id
              FROM ville
              INNER JOIN tunnel ON v_id = t_villedepart_fk
              INNER JOIN groupe ON t_id = g_tunnel_fk
              WHERE g_id = :id
              UNION
              SELECT v_nom AS departArrivee, v_id AS id
              FROM ville
              INNER JOIN tunnel ON v_id = t_villearrivee_fk
              INNER JOIN groupe ON t_id = g_tunnel_fk
              WHERE g_id = :id";

            return DBManager::getInstance()->makeSelect($sql, [':id' => $id]);

    }


}




