<?php
  require_once('../model/model.class.php');
  require_once('../model/model.classDAO.php');

  if(isset($_POST['Creation'])){
    if($dao->validMail($_POST['mail'])){
      $erMail = true;
    } elseif (!($_POST['mdp']===$_POST['mdpVerif'])){
      $erMdp = true;
    } else {

      $dao->creerOffre($_SESSION['utilisateur'],$_POST['intitule'],$_POST['prix'],$_POST['caracteristique']);
      header('Location: ../controleur/compte.ctrl.php?Offr=1');
    }
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

    include('../view/creaCompte.view.php');
 ?>
