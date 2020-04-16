<?php

//TEST = 1 activer l'affichage de l'appel de la méthode
//TEST = 0 supprimer l'affichage de l'appel
define("TEST",1);

class Utilisateur {

  private string $nom;
  private string $prenom;
  private string $adresseMail;
  private string $motDePasse;

  //constructeur de base
  function __construct(string $nom, string $prenom, string $adresseMail, string $motDePasse) {

    $this->nom = $nom;
    $this->prenom = $prenom;
    $this->adresseMail = $adresseMail;
    $this->motDePasse = $motDePasse;
  }

  //méthode get
  function __get(string $attribut) {

    //test d'appel de la méthode
    if(TEST == 1){ echo "appel : ".__METHOD__."($attribut)\n";}

    //retourne une erreur si le nom d'attribut pris en paramètre est inéxistant
    if ( $attribut != "nom" && $attribut != "prenom" && $attribut != "adresseMail" && $attribut != "motDePasse" ) {

      throw new Exception("Error cannot acces '$attribut'", 1);
    }

    return $this->$attribut;
  }


  //méthode set
  function __set(string $attribut, string $value){

    //test d'appel de la méthode
    if(TEST == 1){ echo "appel :".__METHOD__."($attribut)\n";}

    //retourne une erreur si le nom d'attribut pris en paramètre est inéxistant
    if ( $attribut != "nom" && $attribut != "prenom" && $attribut != "adresseMail" && $attribut != "motDePasse" ) {

      throw new Exception("Error cannot acces '$attribut'", 1);
    }

    $this->$attribut = $attribut;
  }

}
?>
