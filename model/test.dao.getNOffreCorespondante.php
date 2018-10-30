<?php
require_once('../model/model.classDAO.php');

// Recupère toutes les tests

$offre = $dao->getAllOffres();

// Affiche 2 catégories pour le test : affiche le pere d'une catégorie

$allOffreSelect = $dao->getNOffreCorespondante(0,"Toute","Toute");
$OffreSelect = $dao->getNOffreCorespondante(2,"Toute","Toute");
$OffreSelectJard = $dao->getNOffreCorespondante(0,"Toute",3);
$OffreSelectRho = $dao->getNOffreCorespondante(0,"Rhône-Alpes","Toute");

echo "////////////////////////////////////////////////////////////////////";
var_dump($offre);

echo "////////////////////////////////////////////////////////////////////";
var_dump($OffreSelectJard);

echo "////////////////////////////////////////////////////////////////////";
var_dump($OffreSelectRho);

?>
