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

function estCatMere($id){
  if($id!="Toute"){
    $tab = array();
    $req = "SELECT * FROM categorie WHERE id = $id AND id IN (SELECT id FROM categorie WHERE id = pere)";
    try{
        if($d = $this->db->query($req)){
          $tab=$d->fetchAll(PDO::FETCH_CLASS,'Categorie');
        }
      }catch(Exception $e){
        echo "error au niveau du getCatMaman".$e;
        return NULL;
      }
      if (isset($tab[0])) {
        $b = true;
      } else {
        $b = false;
      }
      return (bool)$b;
  } else {
    return false;
  }
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

function getIntCat($ref) {
  $req = "SELECT intitule FROM categorie WHERE id = (SELECT categorie FROM offre WHERE ref = $ref)";
  try{
      if($d = $this->db->query($req)){
        $intCat=$d->fetch();
      }
    }catch(Exception $e){
      echo "error au niveau du getCat".$e;
      return NULL;
    }
    return $intCat[0];
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
//test pour recherche avec mot clé
function getNOffreCorespondante($firstId, $region, $categorie,$rec) : array{
  $tab = array();
  if($region=='Toute' && $categorie=='Toute'){
    $where = "WHERE";
  }elseif($region!='Toute' && $categorie!='Toute'){
    $where = "WHERE region = \"$region\" AND categorie = $categorie AND";
  }elseif($region!='Toute' && $categorie=='Toute'){
    $where = "WHERE region = \"$region\" AND";
  }elseif($region=='Toute' && $categorie!='Toute'){
    $where = "WHERE categorie = $categorie AND";
  }

  $req = "SELECT * FROM offre $where intitule LIKE \"%$rec%\" LIMIT 10 Offset $firstId";
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

function getNOffreCorespondanteMere($firstId, $region, $categorie, $rec) : array{
  $tab = array();
  if($region!='Toute'){
    $where = "WHERE region = \"$region\" AND categorie IN (SELECT id FROM categorie WHERE pere = $categorie AND id != $categorie) AND";
  }else{
    $where = "WHERE categorie IN (SELECT id FROM categorie WHERE pere = $categorie AND id != $categorie) AND";
  }

  $req = "SELECT * FROM offre $where intitule LIKE \"%$rec%\" LIMIT 10 Offset $firstId";
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

function getNbOffreRecCatMere($region, $categorieMere) {
  $cats = $this->getCatFille($categorieMere);
  $n=0;
  foreach ($cats as $catf) {
      $n += $this->getNbOffreRec($region,$catf->__get('id'));
  }
  return (int)$n;
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

function creerSuivis($ref,$id) {
  $req = $this->db->prepare("INSERT INTO suivisOffre(refOffre,idUtilisateur) VALUES (:refOffre,:idUtilisateur)");
  $nouveauSuivis = array('refOffre' => (int)$ref,
                         'idUtilisateur' => (int)$id);
  try{
      $req->execute($nouveauSuivis);
    }catch(Exception $e){
      echo "error au niveau du creerSuivis".$e;
    }
}

function estSuivisPar($ref,$id) {
  $req = "SELECT * FROM suivisOffre WHERE refOffre = $ref AND idUtilisateur = $id";
  try{
      if($d = $this->db->query($req)){
        $offre=$d->fetchAll(PDO::FETCH_CLASS,'Offre');
      }
    }catch(Exception $e){
      echo "error au niveau du searchORC".$e;
      return NULL;
    }
    if (isset($offre[0])) {
      $b = true;
    } else {
      $b = false;
    }
    return (bool)$b;
}

function offreSuivisPar($id) {
  $req = "SELECT * FROM offre WHERE ref in (SELECT refOffre FROM suivisOffre WHERE idUtilisateur = $id)";
  try{
      if($d = $this->db->query($req)){
        $offres=$d->fetchAll(PDO::FETCH_CLASS,'Offre');
      }
    }catch(Exception $e){
      echo "error au niveau du searchORC".$e;
      return NULL;
    }
    return $offres;
}

function supprimerSuivis($ref,$id=NULL) {
  if($id!=NULL){
    $req = "DELETE FROM suivisOffre WHERE refOffre = $ref AND idUtilisateur = $id";
  } else {
    $req = "DELETE FROM suivisOffre WHERE refOffre = $ref";
  }
  try{
      $this->db->exec($req);
    }catch(Exception $e){
      echo "error au niveau du SupprimerSuivis".$e;
      return NULL;
    }
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
    $photo = $ref.".".$phototype;
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
        $req->execute($nouvelleOffre);
      }catch(Exception $e){
        echo "error au niveau du creerOffre".$e;
      }
  }

  function supprOffre($ref) {
        $offre = $this->getOffre($ref);
        $this->supprimerSuivis($ref);
        unlink("../data/imgOffre/".$offre->__get('photo'));
        $req = "DELETE FROM offre WHERE ref = $ref";
    try{
        $this->db->exec($req);
      }catch(Exception $e){
        echo "error au niveau du supprOffre".$e;
      }
  }


}
 ?>
