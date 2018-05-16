<?php
declare(strict_types=1);

/**
 * connectDB - Ouvre une connexion à une base de données MySQL
 * @param   string  $host
 *          string  $name
 *          string  $login
 *          string  $pwd
 * @return  object
**/
/*function connectDB() : PDO {
    try {
        return new PDO( 'mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=utf8', DB_LOGIN, DB_PWD, array( PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION ) );
    } catch( PDOException $_e ) {
        die( $_e->getMessage() );
    }
}*/


/**
 * Créer une liste d'infos (nains, tavernes, villes, etc)
 * @param  int   $v_id [description]
 * @return array       [description]
 */
  /*function getListe(string $sql) : array {
    connectDB();

    if ($db=connectDB()) {
        $req = $db->query($sql);
        $req->execute();
        $liste = $req->fetchAll(PDO::FETCH_ASSOC);
      }

      return $liste;
    }
*/




  /*/**
   * Récupération des infos sur la ville de depart/arrivee du nain (page viewNain.php)
   * @param  int   $v_id [description]
   * @return array       [description]
   */
    /*function getVilleDepartArriveeNain( int $id) : array {
      connectDB();

      $sql = "SELECT v_nom AS departArrivee, v_id AS id
              FROM ville
              INNER JOIN tunnel ON v_id = t_villedepart_fk
              INNER JOIN groupe ON t_id = g_tunnel_fk
              WHERE g_id = $id
              UNION
              SELECT v_nom AS departArrivee, v_id AS id
              FROM ville
              INNER JOIN tunnel ON v_id = t_villearrivee_fk
              INNER JOIN groupe ON t_id = g_tunnel_fk
              WHERE g_id = $id";

      if ($db=connectDB()) {
        $req = $db->prepare($sql);
        $req->execute();
        $v_info = $req->fetchAll(PDO::FETCH_ASSOC);
      }

        return $v_info;
    }*/


/**
 * Récupération des infos sur la ville
 * @param  int   $v_id [description]
 * @return array       [description]
 */
  /*function getVilleInfo( int $v_id) : array {
    connectDB();

    $sql = 'SELECT `ville`.*, `n_nom` FROM `ville` INNER JOIN `nain` ON `v_id` = `n_ville_fk` WHERE `v_id` = :v_id';

    if ($db=connectDB()) {
        $req = $db->prepare($sql);
        $req->bindValue(':v_id', $v_id, PDO::PARAM_INT);
        $req->execute();
        $v_info = $req->fetchAll(PDO::FETCH_ASSOC);
      }

      return $v_info;
    }*/


/**
 * Récupération de la liste des tavernes dans chaque ville
 * @param  int   $v_id [description]
 * @return array       [description]
 */
  /*function getTavernListe( int $v_id) : array {
    connectDB();

    $sql = 'SELECT `t_nom`, `t_id`  FROM `taverne` INNER JOIN `ville` ON `t_ville_fk` = `v_id` WHERE `v_id` = :v_id';

    if ($db=connectDB()) {
        $req = $db->prepare($sql);
        $req->bindValue(':v_id', $v_id, PDO::PARAM_INT);
        $req->execute();
        $t_info = $req->fetchAll(PDO::FETCH_ASSOC);
      }

      return $t_info;
    }*/


/**
* Récupération des infos sur la taverne
* @param  int   $t_id [description]
* @return array       [description]
*/
function getTaverneInfo( int $t_id) : array {
  connectDB();

  $sql = 'SELECT `ville`.*, `n_nom` FROM `ville` INNER JOIN `nain` ON `v_id` = `n_ville_fk` WHERE `v_id` = :v_id';

  if ($db=connectDB()) {
    $req = $db->prepare($sql);
    $req->bindValue(':t_id', $t_id, PDO::PARAM_INT);
    $req->execute();
    $t_info = $req->fetchAll(PDO::FETCH_ASSOC);
  }

  return $t_info;
}

/**
 * Retour les infos sur le groupe
 * @param  int   $g_id [id du groupe]
 * @return array       [description]
 */
function getGroupeInfo(int $g_id) : array {
  connectDB();

  if ($dataBase = connectDB()) {

    $sql = 'SELECT `groupe`.*, `n_id`, `n_nom`, `taverne`.`t_id` AS taverneId, `taverne`.`t_nom` AS nomTaverne, `tunnel`.*
    FROM `groupe`
    LEFT JOIN `nain` ON `g_id` = `n_groupe_fk`
    LEFT JOIN `taverne` ON `g_taverne_fk` = `taverne`.`t_id`
    LEFT JOIN `tunnel` ON `g_tunnel_fk` = `tunnel`.`t_id`
    LEFT JOIN `ville` AS villedepart ON `t_villedepart_fk` = `v_id`
    WHERE `g_id`= :g_id';

    $req = $dataBase->prepare($sql);
    $req->bindValue(':g_id', $g_id, PDO::PARAM_INT);
    $req->execute();
    $data = $req->fetchAll(PDO::FETCH_ASSOC);
    }
    return $data;
  }

/**
 * Récuperation des villes de départ/arrivée
 * @param  int   $depart  [description]
 * @param  int   $arrivee [description]
 * @return array          [description]
 */
function getVille(int $depart, int $arrivee) : array {

  connectDB();

  $sql = 'SELECT `v_nom`, `v_id`
          FROM `ville`
          INNER JOIN `tunnel` ON `v_id` = `t_villedepart_fk`
          WHERE `t_villedepart_fk` = :depart
          UNION
          SELECT `v_nom`, `v_id`
          FROM `ville`
          INNER JOIN `tunnel` ON `v_id` = `t_villearrivee_fk`
          WHERE `t_villearrivee_fk` = :arrivee';

  if ($db=connectDB()) {
    $req = $db->prepare($sql);
    $req->bindValue(':depart', $depart, PDO::PARAM_INT);
    $req->bindValue(':arrivee', $arrivee, PDO::PARAM_INT);
    $req->execute();
    $ville = $req->fetchAll(PDO::FETCH_ASSOC);
  }

  return $ville;
}


/**
* Changer le nain de groupe
* @param int $id     [description]
* @param int $groupe [description]
*/
function changeGroupeNain( int $id, int $groupe) : void {
  connectDB();

  $sql = 'UPDATE `nain` SET `n_groupe_fk`= :idGroupe WHERE `n_id` = :idNain';

  if ($db=connectDB()) {
    $req = $db->prepare($sql);
    $req->bindValue(':idGroupe', $groupe, PDO::PARAM_INT);
    $req->bindValue(':idNain', $id, PDO::PARAM_INT);
    $req->execute();
  }
}


/**
 * infos sur la taverne pour la page Taverne.php
 * @param  int   $t_id [description]
 * @return array       [description]
 */
function tavernePageInfo(int $t_id) : array {
  connectDB();
  $sql='SELECT `taverne`.*, `v_nom`, (`t_chambres` - COUNT(`n_id`)) AS `chambresLibres` FROM `taverne` LEFT JOIN ville ON t_ville_fk = v_id LEFT JOIN `groupe` ON `t_id`=`g_taverne_fk` LEFT JOIN `nain` ON `g_id`=`n_groupe_fk` WHERE t_id = :t_id GROUP BY `t_id`';

  if ($db=connectDB()) {
      $req = $db->prepare($sql);
      $req->bindValue(':t_id', $t_id, PDO::PARAM_INT);
      $req->execute();
      $t_info = $req->fetchAll(PDO::FETCH_ASSOC);
    }

    return $t_info;
}
