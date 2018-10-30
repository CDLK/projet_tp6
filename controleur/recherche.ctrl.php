<?php
require_once('../model/model.class.php');
require_once('../model/model.classDAO.php');

  if (isset($_GET['firstId'])) {
    $firstId = $_GET['firstId'];
  } else {
    $firstId = 0;
  }
  if (isset($_GET['r'])) {
    $region = $_GET['r'];
  } else {
    $region = "Toute";
  }
  if (isset($_GET['c'])) {
    $categorie = $_GET['c'];
  } else {
    $categorie = "Toute";
  }

  $config = parse_ini_file('../config/config.ini');

  //
  // $nextId = (isset($_GET['firstId']) && $_GET['firstId'] != 1? (($_GET['firstId']+10) >= $nbMusic ? 1: $_GET['firstId']+10): 10);
  // $precId = (isset($_GET['firstId']) && $_GET['firstId'] != 1? $_GET['firstId']-10: $nbMusic-($nbMusic%10));
  // $precId = ($precId == 0 ? 1 : $precId);

  $offres = $dao->getNOffreCorespondante($firstId,$region,$categorie);
  $nboffre = $dao->getNbOffreRec($region,$categorie);


  include('../view/recherche.view.php');
 ?>
