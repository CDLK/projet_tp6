<?php

    require_once('../model/model.class.php');
    require_once('../model/model.classDAO.php');

    $config = parse_ini_file('../config/config.ini');

    $catMeres = $dao->getCatMere();

    session_start();
    if(isset($_GET['deco'])){
      session_destroy();
    }

    include('../view/mainPage.view.php');
?>
