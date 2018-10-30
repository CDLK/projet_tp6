<?php
// Test de la classe DAO
require_once('../model/model.classDAO.php');

// Recupère toutes les tests

$nb = $dao->getNbOffreRec("Toute","Toute");

// Affiche 2 catégories pour le test : affiche le pere d'une catégorie
  var_dump($nb);

 ?>
