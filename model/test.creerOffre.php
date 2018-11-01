<?php
require_once('../model/model.classDAO.php');

$U = $dao->getUser(1);
// $user,$intitule,$prix,$description,$categorie,$phototype
$testRef = $dao->getOffreNewRef();
$dao->creerOffre($U,'Test',19,'12345',2,'jpg');
$offreCreer = $dao->getOffre($testRef);
var_dump($offreCreer);

?>
