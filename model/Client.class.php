<?php

  //TEST = 1 activer l'affichage de l'appel de la méthode
  //TEST = 0 supprimer l'affichage de l'appel
  //define("TEST",0);

  require_once("Utilisateur.class.php");

  class Client extends Utilisateur {

    private bool $newsletter;
    private bool $genre;      //pour l'instant [1] => homme / [0] => femme
    private string $numeroTelephone;
    private float $tauxReduction;


    //constructeur
    public function __construct(int $refUtilisateur, string $nom, string $prenom, string $adresseMail, string $motDePasse, bool $newsletter, bool $genre, string $numeroTelephone, float $tauxReduction){

      //test d'appel de la méthode
      if(TEST == 1){ echo "appel : ".__METHOD__."\n";}

      //construction de l'objet mère Utilisateur
      parent::__construct($refUtilisateur, $nom, $prenom, $adresseMail, $motDePasse);

      $this->newsletter = $newsletter;
      $this->genre = $genre;
      $this->numeroTelephone = $numeroTelephone;

    }

    //méthode get
    public function __get(string $attribut) {

      //test d'appel de la méthode
      if(TEST == 1){ echo "appel : ".__METHOD__."($attribut)\n";}

      //penser à regarder comment appeler les méthodes magiques
      //retourne une erreur si le nom d'attribut pris en paramètre est inéxistant ( classe mère )

      $retour = parent::_get($attribut);

      //retourne une erreur si le nom d'attribut pris en paramètre est inéxistant ( classe fille )
      if ( $attribut != "newsletter" && $attribut != "genre" && $attribut != "numeroTelephone" && $attribut != "tauxReduction" ) {

        throw new Exception("Error cannot acces '$attribut'", 2);
      }

      return $this->$attribut;
    }


    //méthode set
    public function __set(string $attribut, string $valeur){

      //test d'appel de la méthode
      if(TEST == 1){ echo "appel :".__METHOD__."($attribut)\n";}

      //penser à regarder comment appeler les méthodes magiques
      //retourne une erreur si le nom d'attribut pris en paramètre est inéxistant ( classe mère )
      //retourne une erreur si le nom d'attribut pris en paramètre est inéxistant ( classe fille )
      if ( $attribut != "refUtilisateur" && $attribut != "nom" && $attribut != "prenom" && $attribut != "adresseMail" && $attribut != "motDePasse" && $attribut != "newsletter" && $attribut != "genre" && $attribut != "numeroTelephone" && $attribut != "tauxReduction" ) {

        throw new Exception("Error cannot acces '$attribut'", 2);
      }

      $this->$attribut = $valeur;
    }

  }
?>
