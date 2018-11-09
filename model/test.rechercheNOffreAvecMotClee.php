<?php
// Test de la classe DAO
require_once('../model/model.classDAO.php');

// Recupère toutes les tests

$nb = $dao->getNOffreCorespondante(0,"Toute","Toute","bible");

// Affiche 2 catégories pour le test : affiche le pere d'une catégorie
  var_dump($nb);

 ?>
