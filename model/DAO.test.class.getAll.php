<?php
// Test de la classe DAO
require_once('../model/model.classDAO.php');

// Recupère toutes les catégories
$cat = $dao->getAllCats();
// Affiche 2 catégories pour le test : affiche le pere d'une catégorie
var_dump($cat);
 ?>
