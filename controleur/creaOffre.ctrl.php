<?php
  require_once('../model/model.class.php');
  require_once('../model/model.classDAO.php');

  session_start();

  if(isset($_POST['NouvelleOffre'])){
    var_dump($_FILES["image"]["name"]);
    var_dump($_FILES);
    $extension=end(explode(".", $_FILES["image"]["name"]));
    var_dump($extension);
    if ($_FILES["image"]["size"] > 5242880) {
      $erImg = 1;
    } elseif($extension !="jpg"
            && $extension !="jpeg"
            && $extension !="png"){
      $erImg = 2;
    } else {
      $nouveauNomImage=$dao->getOffreNewRef().".".$extension;
      move_uploaded_file($_FILES['image']['tmp_name'],"../data/imgOffre/".$nouveauNomImage);
      $dao->creerOffre($_SESSION['utilisateur'],$_POST['intitule'],$_POST['prix'],$_POST['description'],$_POST['categorie'],$extension);
      header('Location: ../controleur/compte.ctrl.php?Offr=1');
    }
  } else {
    $erImg = 0;
  }
    $cats = $dao->getAllCatFille();

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
