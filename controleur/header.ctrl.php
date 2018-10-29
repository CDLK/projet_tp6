<?php
require_once('../model/model.class.php');
require_once('../model/model.classDAO.php');

$categories = $dao->getAllCats();
$regions = $dao->getAllRegions();

include('../view/header.view.php');
 ?>
