<?php

    require_once('../model/model.class.php');
    require_once('../model/model.classDAO.php');

    $config = parse_ini_file('../config/config.ini');

    $catMeres = $dao->getCatMere();

    // var_dump($catMeres);

    //$jukebox = new MusicDAO($config['database_path']);

    //$nbElemPage = 10;

    //getTheMotherCategorie


    // $nextId = (isset($_GET['firstId']) && $_GET['firstId'] != 1? (($_GET['firstId']+10) >= $nbMusic ? 1: $_GET['firstId']+10): 10);
    // $precId = (isset($_GET['firstId']) && $_GET['firstId'] != 1? $_GET['firstId']-10: $nbMusic-($nbMusic%10));
    // $precId = ($precId == 0 ? 1 : $precId);a


    // $firstId = (isset($_GET['firstId'])? $_GET['firstId']: 1);
    // $lastId = (($firstId+10) > $nbMusic? $nbMusic : $firstId+10);

    // for($i=$firstId; $i<$lastId;$i++){
    //   // Récupération de l'objet Music
    //   $m = $jukebox->get($i);
    //   // Ajout à la liste des images à afficher
    //   $list[$i] = $config['data_url'].'/img/'.$m->cover;
    // }

    include('../view/mainPage.view.php');
?>
