<?php declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: webuser1801
 * Date: 15/05/2018
 * Time: 14:01
 */

namespace nains\model;

class CoreManager
{


    /**
     * @return array|null
     */
    public function getListeTavernes() : ? array
    {
            $sql = 'SELECT `t_id`, `t_nom` FROM `taverne` ORDER BY `t_id` ASC';
            return DBManager::getInstance()->makeSelect($sql);

    }


    /**
     * @return array|null
     */
    public function getListeVilles() : ? array
    {

        $sql = 'SELECT `v_id`, `v_nom` FROM `ville` ORDER BY `v_id` ASC;';
        return DBManager::getInstance()->makeSelect($sql);

    }


    /**
     * @return array|null
     */
    public function getListeNains() : ? array
    {
        $sql = 'SELECT `n_id`, `n_nom` FROM `nain` ORDER BY `n_id` ASC;';
        return DBManager::getInstance()->makeSelect($sql);

    }


    /**
     * @return array|null
     */
    public function getListeGroupes() : ? array
    {
        $sql = 'SELECT `g_id` FROM `groupe` ORDER BY `g_id` ASC;';
        return DBManager::getInstance()->makeSelect($sql);
    }

}