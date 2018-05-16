<?php
/**
 * Created by PhpStorm.
 * User: webuser1801
 * Date: 15/05/2018
 * Time: 13:57
 */


if (isset($_GET['choisir_nain'])) {

    $idNain = (int)$_GET['nain'];

    // Récuparation des infos sur le nain
    $info = getNainInfo($idNain);

    $villeDepartArrivee = getVilleDepartArriveeNain($info[0]['g_id']);

    $depart = "<a href='ville.php?v_id=".$villeDepartArrivee[0]['id']."'>".$villeDepartArrivee[0]['departArrivee']."</a>";
    $arrivee = "<a href='ville.php?v_id=".$villeDepartArrivee[1]['id']."'>".$villeDepartArrivee[1]['departArrivee']."</a>";

}

// Liste des groupes pour changement de groupe
if ($dataBase = connectDB()) {

    $req = $dataBase->query('SELECT `g_id` FROM `groupe` ORDER BY `g_id` ASC;');
    $data = $req->fetchAll(PDO::FETCH_ASSOC);

    $listeGroupes = '';
    foreach ($data as $g) {
        $listeGroupes .= "<option value='".$g['g_id']."' >".$g['g_id']."</option>";
    }
}

// Changer le nain de groupe
if (isset($_GET['change_groupe'])) {
    $idNain = (int)$_GET['id_nain'];
    $idGroupe = (int)$_GET['groupe'];

    changeGroupeNain($idNain, $idGroupe);

    // Récuparation des infos sur le nain
    $info = getNainInfo($idNain);

    $villeDepartArrivee = getVilleDepartArriveeNain($info[0]['g_id']);

    $depart = "<a href='ville.php?v_id=".$villeDepartArrivee[0]['id']."'>".$villeDepartArrivee[0]['departArrivee']."</a>";
    $arrivee = "<a href='ville.php?v_id=".$villeDepartArrivee[1]['id']."'>".$villeDepartArrivee[1]['departArrivee']."</a>";


    // Reaffichage de la page avec les infos à jour
    $info = getNainInfo($idNain);
    $msg='Changement effectué!';
    $msgClass='bg-success';
}
