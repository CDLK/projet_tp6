<?php
require_once('../model/model.classDAO.php');


$userID = $dao->validUser("RenéLaTaupe@gmail.com","motDePasse");
$userMail = $dao->validMail("RenéLaTaupe@gmail.com");
$user = $dao->getUser(1);
echo "////////////////////////////////////////////////////////////////////";
var_dump($userID);
var_dump($userMail);
var_dump($user);
?>
