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
function searchOffreRegion($region) : array {
  $tab = array();
  $req = "SELECT * FROM offre WHERE region = $region";
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
  $req = 'SELECT * FROM categorie WHERE id = pere';
  try{
      if($d = $this->db->query($req)){
        $tab=$d->fetchAll(PDO::FETCH_CLASS,'Categorie');
      }
    }catch(Exception $e){
      echo "error au niveau du getCatMaman".$e;
      return NULL;
    }
    return $tab;
}

// cherche les categories ayant pour pere cat
function getCatFille($cat) : array{
  $tab = array();
  $req = "SELECT * FROM categorie WHERE pere = $cat AND id != $cat";
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

function getNOffreCorespondante($firstId, $region, $categorie) : array{
  $tab = array();
  if($region=='Toute' && $categorie=='Toute'){
    $where = " ";
  }elseif($region!='Toute' && $categorie!='Toute'){
    $where = "WHERE region = \"$region\" AND categorie = $categorie";
  }elseif($region!='Toute' && $categorie=='Toute'){
    $where = "WHERE region = \"$region\"";
  }elseif($region=='Toute' && $categorie!='Toute'){
    $where = "WHERE categorie = $categorie";
  }

  $req = "SELECT * FROM offre $where LIMIT 10 Offset $firstId";
  try{
      if($d = $this->db->query($req)){
        $tab=$d->fetchAll(PDO::FETCH_CLASS,'Offre');
      }
    }catch(Exception $e){
      echo "error au niveau du searchORC".$e;
      return NULL;
    }
    return $tab;
}

function getNbOffreRec($region, $categorie) {
  if($region=='Toute' && $categorie=='Toute'){
    $where = " ";
  }elseif($region!='Toute' && $categorie!='Toute'){
    $where = "WHERE region = \"$region\" AND categorie = $categorie";
  }elseif($region!='Toute' && $categorie=='Toute'){
    $where = "WHERE region = \"$region\"";
  }elseif($region=='Toute' && $categorie!='Toute'){
    $where = "WHERE categorie = $categorie";
  }

  $req = "SELECT COUNT(*) as count FROM offre $where";
  try{
      if($d = $this->db->query($req)){
        $nb=$d->fetch();
      }
    }catch(Exception $e){
      echo "error au niveau du searchORC".$e;
      return NULL;
    }
    return (int)$nb["count"];
}
}
 ?>
