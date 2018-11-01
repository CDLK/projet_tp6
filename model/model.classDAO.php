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

// cherche les categories ayant pour pere cat
function getAllCatFille() : array{
  $tab = array();
  $req = "SELECT * FROM categorie WHERE pere != id";
  try{
      if($d = $this->db->query($req)){
        $tab=$d->fetchAll(PDO::FETCH_CLASS, 'Categorie');
      }
    }catch(Exception $e){
      echo "error au niveau du searchCatMaman".$e;
      return NULL;
    }
    return $tab;
}

function getCatFromId($id) {
  $req = "SELECT * FROM categorie WHERE id = $id";
  try{
      if($d = $this->db->query($req)){
        $cat=$d->fetchAll(PDO::FETCH_CLASS, 'Categorie');
      }
    }catch(Exception $e){
      echo "error au niveau du searchCatMaman".$e;
      return NULL;
    }
    return $cat[0];
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

function getOffre($ref) {
  $req = "SELECT * FROM offre WHERE ref = $ref";
  try{
      if($d = $this->db->query($req)){
        $offre=$d->fetchAll(PDO::FETCH_CLASS,'Offre');
      }
    }catch(Exception $e){
      echo "error au niveau du searchORC".$e;
      return NULL;
    }
    return $offre[0];
}
function getVendeur($id) {
  $req = "SELECT * FROM utilisateur WHERE identifiant = $id";
  try{
      if($d = $this->db->query($req)){
        $vendeur=$d->fetchAll(PDO::FETCH_CLASS,'Utilisateur');
      }
    }catch(Exception $e){
      echo "error au niveau du searchORC".$e;
      return NULL;
    }
    return $vendeur[0];
}
function validUser($mail,$mdp) {
  $req = "SELECT * FROM utilisateur WHERE mail =\"$mail\" AND mdp =\"$mdp\"";
  try{
      if($d = $this->db->query($req)){
        $user=$d->fetchAll(PDO::FETCH_CLASS,'Utilisateur');
      }
    }catch(Exception $e){
      echo "error au niveau du searchORC".$e;
      return NULL;
    }
    if (isset($user[0])) {
      $id = $user[0]->__get('identifiant');
    } else {
      $id = 0;
    }
    return (int)$id;
}

  function validMail($mail) {
    $req = "SELECT * FROM utilisateur WHERE mail =\"$mail\"";
    try{
        if($d = $this->db->query($req)){
          $user=$d->fetchAll(PDO::FETCH_CLASS,'Utilisateur');
        }
      }catch(Exception $e){
        echo "error au niveau du searchORC".$e;
        return NULL;
      }
      if (isset($user[0])) {
        $b = true;
      } else {
        $b = false;
      }
      return (bool)$b;
  }

  function getUser($id) {
    $req = "SELECT * FROM utilisateur WHERE identifiant = $id";
    try{
        if($d = $this->db->query($req)){
          $user=$d->fetchAll(PDO::FETCH_CLASS,'Utilisateur');
        }
      }catch(Exception $e){
        echo "error au niveau du searchORC".$e;
        return NULL;
      }
      return $user[0];
  }

  function getOffreUser($id) {
    $req = "SELECT * FROM offre WHERE id = $id";
    try{
        if($d = $this->db->query($req)){
          $offre=$d->fetchAll(PDO::FETCH_CLASS,'Offre');
        }
      }catch(Exception $e){
        echo "error au niveau du searchORC".$e;
        return NULL;
      }
      return $offre;
  }

  function getUserNewId() {
    $req = "SELECT MAX(identifiant) FROM utilisateur";
    try{
        if($d = $this->db->query($req)){
          $max=$d->fetch();
        }
      }catch(Exception $e){
        echo "error au niveau du getUserNewId".$e;
        return NULL;
      }
      return (int)($max[0]+1);
  }

  function getOffreNewRef() {
    $req = "SELECT MAX(ref) FROM offre";
    try{
        if($d = $this->db->query($req)){
          $max=$d->fetch();
        }
      }catch(Exception $e){
        echo "error au niveau du getOffreNewRef".$e;
        return NULL;
      }
      return (int)($max[0]+1);
  }

  function creerCompte($nom,$prenom,$age,$mdp,$region,$mail,$telephone) {
    $id = $this->getUserNewId();
    $req = $this->db->prepare("INSERT INTO utilisateur (identifiant,nomUser,prenomUser,age,mdp,region,mail,telephone) VALUES (:id,:nom,:prenom,:age,:mdp,:region,:mail,:telephone)");
    $nouvelleUtilisateur = array('id' => (int)$id,
                                'nom' => $nom,
                                'prenom' => $prenom,
                                'age' => (int)$age,
                                'mdp' => $mdp,
                                'region' => $region,
                                'mail' => $mail,
                                'telephone' => $telephone);
    try{
        $req->execute($nouvelleUtilisateur);
      }catch(Exception $e){
        echo "error au niveau du creerCompte".$e;
      }
  }
  function creerOffre($user,$intitule,$prix,$description,$categorie,$phototype) {
    $ref = $this->getOffreNewRef();
    $photo = $ref.$phototype;
    $req = $this->db->prepare("INSERT INTO offre (ref,photo,intitule,prix,region,caracteristique,id,categorie) VALUES (:ref,:photo,:intitule,:prix,:region,:caracteristique,:id,:categorie)");
    $nouvelleOffre = array('ref' => (int)$ref,
                          'photo' => $photo,
                          'intitule' => $intitule,
                          'prix' => $prix,
                          'region' => $user->__get('region'),
                          'caracteristique' => $description,
                          'id' => $user->__get('identifiant'),
                          'categorie' => $categorie);
    try{
        $req->execute($nouvelleUtilisateur);
      }catch(Exception $e){
        echo "error au niveau du creerOffre".$e;
      }
  }


}
 ?>
