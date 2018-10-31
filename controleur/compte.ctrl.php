<?php
require_once('../model/model.class.php');
require_once('../model/model.classDAO.php');

$config = parse_ini_file('../config/config.ini');

session_start();

if(isset($_SESSION['utilisateur'])){
  $userCo = true;
  $user = $_SESSION['utilisateur'];
  $mesOffre = $dao->getOffreUser($user->__get('identifiant'));
} else {
  $userCo = false;
}

include('../view/compte.view.php');
 ?>
