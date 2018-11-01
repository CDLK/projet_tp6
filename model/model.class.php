<?php

class Offre{

  private $ref;
  private $photo;
  private $intitule;
  private $prix;
  private $region;
  private $caracteristique;
  private $id;
  private $categorie;


  // function __construct(int $categorie ,string $caracteristique ,string $region,string $intitule,string $photo) {
  //     //$this->ref = $ref;faire avec le DAO, le dernier numero de produit
  //     $this->photo = $photo;
  //     $this->intitule = $intitule;
  //     $this->prix = $prix;
  //     $this->region = $region;
  //     $this->caracteristique = $caracteristique;
  //     //$this->id = id; // faire avec lutilisaturDAO
  //     $this->categorie = $categorie;
  //
  //   // Verification que toutes les valeurs sont renseignées
  //   //assert — Vérifie si une assertion est fausse
  //   assert(isset($this->ref));
  //   assert(isset($this->photo));
  //   assert(isset($this->intitule));
  //   assert(isset($this->prix));
  //   assert(isset($this->region));
  //   assert(isset($this->caracteristique));
  //   assert(isset($this->id));
  //   assert(isset($this->categorie));
  // }

//////////////////////////////////////////////////////////////////
  // Getter : on en déclare qu'un seul pour tous les acces
  //////////////////////////////////////////////////////////////////
public function __get(string $property) {
    return $this->$property;
    //car dans le test on fait a->...
    //et le attribut sont en private
  }

}


class Utilisateur {

  private $identifiant;
  private $nomUser;
  private $prenomUser;
  private $age;
  private $mdp;
  private $region;
  private $mail;
  private $telephone;

  // function __construct(string $nomUser, string $prenomUser,int $age, string $mdp, string $region, string $mail, int $telephone){
  // //$this->identifiant = identifiant recuperer le dernier numero d'identifiant
  // $this->nomUser = $nomUser;
  // $this->prenomUser= $prenomUser;
  // $this->age = $age;
  // $this->mdp = $mdp;
  // $this->region = $region;
  // $this->mail = $mail;
  // $this->telephone = $telephone;
  //
  //   // Verification que toutes les valeurs sont renseignées
  //   //assert — Vérifie si une assertion est fausse
  //   assert(isset($this->nomUser));
  //   assert(isset($this->prenomUser));
  //   assert(isset($this->age));
  //   assert(isset($this->mdp));
  //   assert(isset($this->region));
  //   assert(isset($this->caracteristique));
  //   assert(isset($this->mail));
  //   assert(isset($this->telephone));
  //   }



    //////////////////////////////////////////////////////////////////
      // Getter : on en déclare qu'un seul pour tous les acces
      //////////////////////////////////////////////////////////////////
    public function __get(string $property) {
        ///////////////////////////////////////////////////////////////////////////
        // COMPLETER LE RETOUR DU GETTER GENERIQUE
        ///////////////////////////////////////////////////////////////////////////
        return $this->$property;
        //car dans le test on fait a->...
        //et le attribut sont en private
      }
      





}

class Categorie{
  private $id;
  private $intitule;
  private $pere;

  // function __construct(int $id, string $intitule, int $pere){
  //   $this->id = $id;
  //   $this->intitule = $intitule;
  //   $this->pere = $pere;
  //
  //   assert(isset($this->id));
  //   assert(isset($this->intitule));
  //   assert(isset($this->pere));
  // }

  public function __get(string $property) {
      return $this->$property;
    }

}

class Region{
  private $nom;

  public function getNom() {
      return $this->nom;
    }
}
 ?>
