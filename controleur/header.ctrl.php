<?php
require_once('../model/model.class.php');
require_once('../model/model.classDAO.php');

$categories = $dao->getAllCats();
$regions = $dao->getAllRegions();

session_start();

if(isset($_SESSION['utilisateur'])){
  $userCo = true;
  $user = $_SESSION['utilisateur'];
} else {
  $userCo = false;
}

include('../view/header.view.php');
 ?>
