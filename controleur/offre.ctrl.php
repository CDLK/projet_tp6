<?php
    require_once('../model/model.class.php');
    require_once('../model/model.classDAO.php');

    $config = parse_ini_file('../config/config.ini');

    if (isset($_GET['firstId'])) {
      $firstId = $_GET['firstId'];
    } else {
      $firstId = 0;
    }

    if (isset($_GET['ref'])) {
      $ref = $_GET['ref'];
      $offre = $dao->getOffre($ref);
    } else {
      $offre = $dao->getOffre(1);
    }

    if (isset($_GET['r'])) {
      $reg = $_GET['r'];
    } else {
      $reg = "Toute";
    }
    if (isset($_GET['c'])) {
      $cate = $_GET['c'];
    } else {
      $cate = "Toute";
    }

      $vendeur = $dao->getVendeur($offre->__get('id'));


    include('../view/vueOffre.view.php');
?>
