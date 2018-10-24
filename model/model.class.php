<?php

class offre{

  private $ref;
  private $photo;
  private $intitule;
  private $prix;
  private $region;
  private $caracteristique;
  private $id;
  private $categorie;


  function __construct(int $categorie ,string $caracteristique ,string $region,string $intitule,string $photo) {
      //$this->ref = $ref;faire avec le DAO, le dernier numero de produit
      $this->photo = $photo;
      $this->intitule = $intitule;
      $this->prix = $prix;
      $this->region = $region;
      $this->caracteristique = $caracteristique;
      //$this->id = id; // faire avec lutilisaturDAO
      $this->categorie = $categorie;

    // Verification que toutes les valeurs sont renseignées
    //assert — Vérifie si une assertion est fausse
    assert(isset($this->ref));
    assert(isset($this->photo));
    assert(isset($this->intitule));
    assert(isset($this->prix));
    assert(isset($this->region));
    assert(isset($this->caracteristique));
    assert(isset($this->id));
    assert(isset($this->categorie));
  }


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








 ?>
