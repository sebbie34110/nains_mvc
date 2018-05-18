<?php declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: webuser1801
 * Date: 15/05/2018
 * Time: 14:01
 */

namespace nains\model;

class GroupeManager extends HomepageManager
{


    /**
     * @return array|null
     */
    public function getListeGroupes() : ? array
    {

        $sql = 'SELECT `g_id` FROM `group` ORDER BY `g_id` ASC';

        return DBManager::getInstance()->makeSelect($sql);

    }


    /**
     * @return array|null
     */
    public function getHorairesDebut() : ? array
    {

        $sql = 'SELECT `g_debuttravail` AS debut FROM `group` GROUP BY `g_debuttravail` ORDER BY `g_debuttravail` ASC';

        return DBManager::getInstance()->makeSelect($sql);

    }


    /**
     * @return array|null
     */
    public function getHorairesFin() : ? array
    {

        $sql = 'SELECT `g_fintravail` AS fin FROM `group` GROUP BY `g_fintravail` ORDER BY `g_fintravail` ASC';

        return DBManager::getInstance()->makeSelect($sql);

    }

    /**
     * Retour les infos sur le group
     * @param  int   $g_id [id du group]
     * @return array       [description]
     */
    public function getGroupInfo(int $id) : ? array
    {
        $sql = 'SELECT `group`.*, `n_id`, `n_nom`, `taverne`.`t_id` AS taverneId, `taverne`.`t_nom` AS nomTaverne, `tunnel`.*
        FROM `group`
        LEFT JOIN `nain` ON `g_id` = `n_groupe_fk`
        LEFT JOIN `taverne` ON `g_taverne_fk` = `taverne`.`t_id`
        LEFT JOIN `tunnel` ON `g_tunnel_fk` = `tunnel`.`t_id`
        LEFT JOIN `ville` AS villedepart ON `t_villedepart_fk` = `v_id`
        WHERE `g_id`= :id';

        return DBManager::getInstance()->makeSelect($sql, [':id' => $id]);
    }

    public function getGroupeById(int $id) : entities\Groupe
    {
        $sql = 'SELECT `g_id` AS `id`, `g_debuttravail` AS `debuttravail` , `g_fintravail` AS `fintravail`, `g_taverne_fk` AS `taverne`, `g_tunnel_fk` AS `tunnel`
        FROM `groupe` 
        WHERE `g_id`= :id';

        $data = DBManager::getInstance()->makeSelect($sql, [':id' => $id]);

        return new entities\Groupe($data[0]);
    }


}



/*
    // liste des tunnels
$sql = 'SELECT `t_id` AS id FROM `tunnel` ORDER BY `t_id` ASC';
$tInfo = getListe($sql);
$tunnelListe="";
foreach ($tInfo as $t) {
$tunnelListe .= "<option value=".$t['id'].">".$t['id']."</option>";
}

// liste tavernes
$sql = 'SELECT `t_nom`, `t_id`  FROM `taverne` ORDER BY `t_id` ASC';
$taverneInfo = getListe($sql);
$taverneListe="";
foreach ($taverneInfo as $t) {
    $taverneListe .= "<option value=".$t['t_id'].">".$t['t_nom']."</option>";
}*/
