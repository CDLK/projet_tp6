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
        $tab=$d->fetchAll(PDO::FETCH_CLASS,'Categorie', array('id','intitule','pere'));
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

function getAllRegion() : array {
    $tab = array();
    $req = "SELECT * FROM region";
    try{
      if($d = $this->db->query($req)){
        $tab=$d->fetchAll();
      }
    }catch(Exception $e){
      echo "error au niveau du getAllregion".$e;
      return NULL;
    }
    return $tab[0];
}


function search($name) : array{
  $tab = array();
  $rep = "SELECT * FROM produit where";
}

































}
 ?>
