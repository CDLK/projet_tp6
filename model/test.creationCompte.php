<?php
require_once('../model/model.classDAO.php');

// Recupère toutes les tests
// $nom,$prenom,$age,$mdp,$region,$mail,$telephone
$testId = $dao->getUserNewId();
var_dump($testId);
$dao->creerCompte('Jack','Duy',19,'12345','Limousin','mial',0666);
$newU = $dao->getUser($testId);
var_dump($newU);

?>
