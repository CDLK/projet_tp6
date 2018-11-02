<?php
require_once('../model/model.class.php');
require_once('../model/model.classDAO.php');

$categories = $dao->getAllCatFille();
$regions = $dao->getAllRegions();

if(isset($_SESSION['utilisateur'])){
  $userCo = true;
  $user = $_SESSION['utilisateur'];
} else {
  $userCo = false;
}

if(isset($_GET['deco'])){
  $userCo = false;
}

include('../view/header.view.php');
 ?>
