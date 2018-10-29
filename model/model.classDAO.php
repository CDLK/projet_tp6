<?php

require_once("../model/model.class.php");


//pour les tests
$dao = new DAO();

class DAO{
    private $db;
    function __construct(){
      try {
      $config = parse_ini_file('../config/config.ini');
      $path = $config['database_path'];
      $this->db = new PDO("sqlite:$path");
      }
    catch (PDOException $e){
    die("erreur de connexion a la database: ".$e->getMessage());
    }
  }

function getAllCats() : array {
    $tab = array();
    $req = "SELECT * FROM categorie";
    try{
      if($d = $this->db->query($req)){
        //PDO::FETCH_CLASS,'Categorie'
        $tab=$d->fetchAll(PDO::FETCH_CLASS,'Categorie');
      }
    }catch(Exception $e){
      echo "error au niveau du getAllCat ".$e;
      return NULL;
    }
    return $tab;
  }
function getAllUsers() : array {
    $tab = array();
    $req = "SELECT * FROM utilisateur";
    try{
      if($d = $this->db->query($req)){
        $tab=$d->fetchAll(PDO::FETCH_CLASS, 'Utilisateur');
      }
    }catch(Exception $e){
      echo "error au niveau du getAllUsers ".$e;
      return NULL;
    }
    return $tab;
  }

  function getAllOffres() : array {
    $tab = array();
    $req = "SELECT * FROM offre";
    try{
      if($d = $this->db->query($req)){
        $tab=$d->fetchAll(PDO::FETCH_CLASS
        , 'Offre');
      }
    }catch(Exception $e){
      echo "error au niveau du getAllOffres ".$e;
      return NULL;
    }
    return $tab;
  }

function getAllRegions() : array {
    $tab = array();
    $req = "SELECT * FROM region";
    try{
      if($d = $this->db->query($req)){
        $tab=$d->fetchAll(PDO::FETCH_CLASS
        , 'Region');
      }
    }catch(Exception $e){
      echo "error au niveau du getAllregion".$e;
      return NULL;
    }
    return $tab;
}


function search($name) : array{
  $tab = array();
  $rep = "SELECT * FROM offre where intitule LIKE %$name%";
  try{
      if($d = $this->db->query($req)){
        $tab=$d->fetchAll();
      }
    }catch(Exception $e){
      echo "error au niveau du search".$e;
      return NULL;
    }
    return $tab;
}

//recherche les produits par region
function searchOffreRegion() : array {
  $tab = array();
  $rep = "SELECT * FROM produit p, offre o WHERE p.region = o.region";
  try{
      if($d = $this->db->query($req)){
        $tab=$d->fetchAll();
      }
    }catch(Exception $e){
      echo "error au niveau du searchOffreRegion".$e;
      return NULL;
    }
    return $tab;
}

// cherche les categorie mère tel que produit
function getCatMere() : array{
  $tab = array();
  $rep = "SELECT * FROM categorie WHERE id = 1";
  try{
      if($d = $this->db->query($req)){
        $tab=$d->fetchAll(PDO::FETCH_CLASS,'Categorie');
      }
    }catch(Exception $e){
      echo "error au niveau du searchCatMaman".$e;
      return NULL;
    }
    return $tab;
}

// cherche les categories ayant pour pere cat
function getCatFille($cat) : array{
  $tab = array();
  $rep = "SELECT * FROM categorie WHERE id = $cat";
  try{
      if($d = $this->db->query($req)){
        $tab=$d->fetchAll(PDO::FETCH_CLASS
        , 'Categorie');
      }
    }catch(Exception $e){
      echo "error au niveau du searchCatMaman".$e;
      return NULL;
    }
    return $tab;
}


//recherche par offre/region/categorie
function searchORC($region, $categorie) : array{
  $tab = array();
  $rep = "SELECT * FROM offre o, region r, categorie c WHERE o.region=$region->nom AND o.categorie=$categorie->id";
  try{
      if($d = $this->db->query($req)){
        $tab=$d->fetchAll();
      }
    }catch(Exception $e){
      echo "error au niveau du searchORC".$e;
      return NULL;
    }
    return $tab;
}






























}
 ?>
