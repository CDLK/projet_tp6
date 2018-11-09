<?php
require_once('../model/model.class.php');
require_once('../model/model.classDAO.php');

  session_start();
  if(isset($_GET['deco'])){
    session_destroy();
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
    if($dao->estCatMere($_GET['c'])){
      $catsFille = $dao->getCatFille($_GET['c']);
    }
    $cate = $_GET['c'];
  } else {
    $cate = "Toute";
  }
  if (isset($_GET['rec'])) {
    $rec = $_GET['rec'];
  } else {
    $rec = "";
  }


  $config = parse_ini_file('../config/config.ini');

  if($dao->estCatMere($_GET['c'])){
    $offres = $dao->getNOffreCorespondanteMere($firstId,$reg,$cate,$rec);
    $nboffre = $dao->getNbOffreRecCatMere($reg,$cate,$rec);
  } else {
    $offres = $dao->getNOffreCorespondante($firstId,$reg,$cate,$rec);
    $nboffre = $dao->getNbOffreRec($reg,$cate,$rec);
  }

  include('../view/recherche.view.php');
 ?>
