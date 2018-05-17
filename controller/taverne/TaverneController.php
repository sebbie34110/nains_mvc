<?php
/**
 * Created by PhpStorm.
 * User: webuser1801
 * Date: 15/05/2018
 * Time: 13:59
 */


//Récupartion des infos sur la taverne

if ($_GET['t_id']) {
    $t_id = $_GET['t_id'];

    $tInfo = tavernePageInfo($t_id);

    $nom = $tInfo[0]['t_nom'];
    $ville = "<a href='ville.php?v_id=".$tInfo[0]['t_ville_fk']."'>".$tInfo[0]['v_nom']."</a>";
    $blonde = '<li>blonde</li>';
    $brune = '<li>brune</li>';
    $rousse = '<li>rousse</li>';
    $chambres = $tInfo[0]['t_chambres'];
    $chambresLibres = $tInfo[0]['chambresLibres'];

}