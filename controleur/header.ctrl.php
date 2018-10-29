<?php
require_once('../model/model.class.php');
require_once('../model/model.classDAO.php');

$categories = $dao->getAllCats();
$regions = $dao->getAllRegion();

include('header.view.php');
 ?>
