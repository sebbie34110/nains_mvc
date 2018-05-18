<?php declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: webuser1801
 * Date: 15/05/2018
 * Time: 14:02
 */

namespace nains\model;


use nains\model\entities\Ville;

class VilleManager extends HomepageManager
{


    /**
     * @return array
     */
    public function getListeVilles() : array
    {
            $villes = [];

            $sql = 'SELECT `v_id` as `id`, `v_nom` as `nom`, `v_superficie` as `superficie` FROM `ville` ORDER BY `v_id` ASC;';

            $data = DBManager::getInstance()->makeSelect($sql);

            foreach ($data as $v){
                $villes[] = new Ville($v);
            }

            return $villes;
    }



    /**
     * @param int $v_id
     * @return array
     */
    public function getVilleInfo($ville) : Ville {

        if (is_int($ville)){

            $sql = 'SELECT `v_id` as `id`, `v_nom` as `nom`, `v_superficie` AS `superficie` FROM `ville` WHERE `v_id` = :v_id';
            $data = DBManager::getInstance()->makeSelect($sql, [':v_id', $ville]);

        } else {

            $sql = 'SELECT `v_id` as `id`, `v_nom` as `nom`, `v_superficie` AS `superficie` FROM `ville` WHERE `v_nom` = :v_nom';
            $data = DBManager::getInstance()->makeSelect($sql, [':v_nom', $ville]);

        }

        return new Ville($data);

    }


    /**
     * @param int $v_id
     * @return array
     */
    public function getVilleById(int $id) : Ville {

            $sql = 'SELECT `v_id` as `id`, `v_nom` as `nom`, `v_superficie` AS `superficie` FROM `ville` WHERE `v_id` = :id';

            $data = DBManager::getInstance()->makeSelect($sql, ['id', $id]);


        return new Ville($data[0]);

    }


    /**
     * @param string $ville
     * @return Ville
     */
    public function getVilleByName(string $ville) : Ville {

        $sql = 'SELECT `v_id` as `id`, `v_nom` as `nom`, `v_superficie` AS `superficie` FROM `ville` WHERE `v_nom` = :ville';

        $data = DBManager::getInstance()->makeSelect($sql, ['ville', $ville]);


        return new Ville($data[0]);

    }





    /**
     * Récuperation des villes de départ/arrivée
     * @param  int   $depart  [description]
     * @param  int   $arrivee [description]
     * @return array          [description]
     */
    public function getVille(int $depart, int $arrivee) : array
    {
      $sql = 'SELECT `v_nom`, `v_id`
              FROM `ville`
              INNER JOIN `tunnel` ON `v_id` = `t_villedepart_fk`
              WHERE `t_villedepart_fk` = :depart
              UNION
              SELECT `v_nom`, `v_id`
              FROM `ville`
              INNER JOIN `tunnel` ON `v_id` = `t_villearrivee_fk`
              WHERE `t_villearrivee_fk` = :arrivee';


      return DBManager::getInstance()->makeSelect($sql, [':depart' => $depart, ':arrivee' => $arrivee]);
    }





}
