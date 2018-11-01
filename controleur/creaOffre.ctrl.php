<?php
  require_once('../model/model.class.php');
  require_once('../model/model.classDAO.php');

  session_start();

  if(isset($_POST['NouvelleOffre'])){
    var_dump();


    $dao->creerOffre($_SESSION['utilisateur'],$_POST['intitule'],$_POST['prix'],$_POST['description']);

    header('Location: ../controleur/compte.ctrl.php?Offr=1');
  } else {
    $erMail = false;
    $erMdp = false;
  }

    if (isset($_GET['firstId'])) {
      $firstId = $_GET['firstId'];
    } else {
      $firstId = 0;
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

    $config = parse_ini_file('../config/config.ini');

    include('../view/creaOffre.view.php');
 ?>
