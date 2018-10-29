<?php
// Test de la classe DAO
require_once('../model/model.classDAO.php');

// Recupère toutes les tests

$cat = $dao->getAllCats();
$user = $dao->getAllUsers();
$offre = $dao->getAllOffres();
$region = $dao->getAllRegions();

// Affiche 2 catégories pour le test : affiche le pere d'une catégorie
  var_dump($cat);
  var_dump($user);
  var_dump($offre);
 ?>
