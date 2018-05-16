<?php
/**
 * Created by PhpStorm.
 * User: webuser1801
 * Date: 15/05/2018
 * Time: 14:00
 */


// Récupération des infos de la Ville
if ($_GET) {
    $v_id = (int)$_GET['v_id'];

    $villeInfo = getVilleInfo($v_id);
    $taverneInfo = getTavernListe( $v_id);

    $ville = $villeInfo[0]['v_nom'];
    $superficie = $villeInfo[0]['v_superficie'];

    // nains originaire de la ville
    $listeNains="";
    foreach ($villeInfo as $key) {
        $listeNains .= "<li>".$key['n_nom']."</li>";
    }

    // Liste des tavernes
    $listeTavernes = '';
    foreach ($taverneInfo as $key) {
        //$listeTavernes .= "<li>".$key['t_nom']."</li>";
        $listeTavernes .= '<li><a href="viewTaverne.php?t_id='.$key['t_id'].'">'.$key['t_nom'].'</a></li>';
    }

    // Progres des tunnels de la ville
    $sql = 'SELECT t_progres, v_id, v_nom AS villeArrivee
            FROM tunnel
            INNER JOIN ville ON t_villearrivee_fk = v_id
            WHERE t_villedepart_fk = 1
            UNION
            SELECT t_progres, v_id, v_nom AS villeArrivee
            FROM tunnel
            INNER JOIN ville ON t_villearrivee_fk = v_id
            WHERE t_villearrivee_fk = 1
            ORDER BY villeArrivee ASC';
    $progres = getListe($sql);

    $progresListe = "";
    foreach ($progres as $p) {
        $progresListe.= "<li>Tunnel vers <a href='ville.php?v_id=".$p['v_id']."'>".$p['villeArrivee']."</a> : ".$p['t_progres']."% terminé.</li>";
    }
}
