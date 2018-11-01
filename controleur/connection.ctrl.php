<?php
  require_once('../model/model.class.php');
  require_once('../model/model.classDAO.php');

  if(isset($_POST['Connection'])){
    $id=$dao->validUser($_POST['mail'],$_POST['mdp']);
    if($id!=0){
      session_start();
      $_SESSION['utilisateur'] = $dao->getUser($id);
      header('Location: ../controleur/mainPage.ctrl.php');
    }else{
      $erCo = true;
      $validMail = $dao->validMail($_POST['mail']);
    }

  } else {
    $erCo = false;
    $validMail = true;
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

    include('../view/pageConnection.view.php');
 ?>
