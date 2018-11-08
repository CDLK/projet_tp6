<?php
    error_reporting(E_ALL);
    ini_set("display_errors", 1);
    require_once('../model/model.class.php');
    require_once('../model/model.classDAO.php');

    $config = parse_ini_file('../config/config.ini');

    session_start();
    if(isset($_GET['deco'])){
      session_destroy();
    }

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
      $ref = 1;
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

    if(isset($_SESSION['utilisateur'])){
      if(isset($_POST['suivre'])){
        $dao->creerSuivis($offre->__get('ref'),$_SESSION['utilisateur']->__get('identifiant'));
      } elseif (isset($_POST['arSuivis'])) {
        $dao->supprimerSuivis($offre->__get('ref'),$_SESSION['utilisateur']->__get('identifiant'));
      }
      $estSuivis = $dao->offreSuivisPar($offre->__get('ref'),$_SESSION['utilisateur']->__get('identifiant'));
    }

      $vendeur = $dao->getVendeur($offre->__get('id'));


    include('../view/vueOffre.view.php');
?>
