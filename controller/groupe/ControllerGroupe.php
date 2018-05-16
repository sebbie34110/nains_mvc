<?php declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: webuser1801
 * Date: 15/05/2018
 * Time: 13:54
 */

namespace nains\controller\groupe;

class ControllerGroupe
{

    if (isset($_GET['g_id'])) {
    $g_id = (int)$_GET['g_id'];

    $infoGroupe = getGroupeInfo($g_id);

    // Liste des nains du groupe
    $nainsGroupe = '';
    foreach ($infoGroupe as $key) {
    $nainsGroupe .= '<li>' . $key['n_nom'] . '</li>';
    }

    $taverne = "<a href='viewTaverne.php?t_id=".$infoGroupe[0]['t_id']."'>".$infoGroupe[0]['nomTaverne']."</a>";

    // Recupération des villes de départ/arrivée
    $v_depart = (int)$infoGroupe[0]['t_villedepart_fk'];
    $v_arrivee = (int)$infoGroupe[0]['t_villearrivee_fk'];
    $villes = getVille($v_depart, $v_arrivee);

    $dep = "<a href='ville.php?v_id=".$villes[0]['v_id']."'>".$villes[0]['v_nom']."</a>";
    $arr = "<a href='ville.php?v_id=".$villes[1]['v_id']."'>".$villes[1]['v_nom']."</a>";
    }



}







