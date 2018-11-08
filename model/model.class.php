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
