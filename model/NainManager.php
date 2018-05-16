<?php declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: webuser1801
 * Date: 15/05/2018
 * Time: 14:01
 */

namespace nains\model;

class NainManager extends CoreManager
{

    /**
     * Récupération de la liste des nains
     * @return array
     */
    public function getListeNains() : array
    {


           $sql = 'SELECT `n_id`, `n_nom` FROM `nain` ORDER BY `n_id` ASC;';

           return DBManager::getInstance()->makeSelect($sql);


    }


    /**
     * Recupere un nain dans la BD
     * @param int $id
     * @return array
     */
    public function getNain(int $id) : array {


            $sql = 'SELECT `n_id`, `n_nom`, `n_barbe`, `ville`.*, `groupe`.*, `taverne`.`t_id`, `t_nom`, `tunnel`.*
                    FROM `nain`
                    LEFT JOIN `ville` ON `n_ville_fk` = `v_id`
                    LEFT JOIN `groupe` ON `n_groupe_fk` = `g_id`
                    LEFT JOIN `taverne` ON `g_taverne_fk` = `t_id`
                    LEFT JOIN `tunnel` ON `g_tunnel_fk` = `tunnel`.`t_id`
                    WHERE `n_id`= :id';

            return DBManager::getInstance()->makeselect($sql, [':id' => $id]);

    }


}