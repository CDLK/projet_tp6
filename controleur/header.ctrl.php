<?php
require_once('../model/model.class.php');
require_once('../model/model.classDAO.php');

$categories = $dao->getAllCats();
$regions = $dao->getAllRegions();

if(isset($_SESSION['utilisateur'])){
  session_start();
  $userCo = true;
} else {
  $userCo = false;
}

include('../view/header.view.php');
 ?>
