<?php declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: webuser1801
 * Date: 15/05/2018
 * Time: 14:01
 */

namespace nains\model;

class TaverneManager extends CoreManager
{

    /**
     * @param int $v_id
     * @return array|null
     */
    public function getTavernesInCity(int $v_id) : ? array
    {

        $sql = 'SELECT `t_nom`, `t_id`  FROM `taverne` INNER JOIN `ville` ON `t_ville_fk` = `v_id` WHERE `v_id` = :v_id';

        return DBManager::getInstance()->makeSelect($sql, [':v_id' => $v_id]);
    }




}