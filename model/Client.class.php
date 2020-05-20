<?php
  //inclus dans Utilisateur
  //TEST = 1 activer l'affichage de l'appel de la méthode
  //TEST = 0 supprimer l'affichage de l'appel
  //define("TEST",0);

  require_once("Utilisateur.class.php");


  class Client extends Utilisateur {

    private bool $newsletter;
    private int $genre;      //pour l'instant [1] => homme / [2] => femme / [0] => autre
    private float $tauxReduction;


    //constructeur
    public function __construct(int $refUtilisateur, string $nom, string $prenom, string $adresseMail, string $motDePasse, string $etat, string $numeroTelephone, bool $newsletter, int $genre = 0, float $tauxReduction){

      //test d'appel de la méthode
      if(TEST == 1){ echo "appel : ".__METHOD__."\n";}

      //construction de l'objet mère Utilisateur
      parent::__construct($refUtilisateur, $nom, $prenom, $adresseMail, $motDePasse, $etat, $numeroTelephone);

      $this->newsletter = $newsletter;
      $this->tauxReduction = $tauxReduction;

      //filtre saisie genre
      $this->genre = ( $genre >= 0 && $genre <= 2 ) ? $genre : 0 ;
    }

    //méthode get
    public function __get(string $attribut) {

      //test d'appel de la méthode
      if(TEST == 1){ echo "appel : ".__METHOD__."($attribut)\n";}

      //code d'erreur
      $retour = -1;

      //retourne une erreur si le nom d'attribut pris en paramètre est inéxistant ( classe mère )
      if( $attribut == "refUtilisateur" || $attribut == "nom" || $attribut == "prenom" || $attribut == "adresseMail" || $attribut == "motDePasse" || $attribut == "etat" || $attribut == "numeroTelephone" ){

        $retour = parent::__get($attribut);
      }
      //retourne une erreur si le nom d'attribut pris en paramètre est inéxistant ( classe fille )
      else if ( $attribut == "newsletter" || $attribut == "genre" || $attribut == "tauxReduction") {

        $retour = $this->$attribut;
      }
      else {

        throw new Exception("Error cannot acces '$attribut'", 2);
      }

      return $retour;
    }


    //méthode set
    public function __set(string $attribut, $valeur){

      //test d'appel de la méthode
      if(TEST == 1){ echo "appel :".__METHOD__."($attribut)\n";}

      //retourne une erreur si le nom d'attribut pris en paramètre est inéxistant ( classe mère )
      if( $attribut == "refUtilisateur" || $attribut == "nom" || $attribut == "prenom" || $attribut == "adresseMail" || $attribut == "motDePasse" || $attribut == "etat" || $attribut == "numeroTelephone" ){

        parent::__set($attribut, $valeur);
      }
      //retourne une erreur si le nom d'attribut pris en paramètre est inéxistant ( classe fille )
      elseif ( $attribut == "genre") {

        //filtre du genre
        $this->$attribut = ( $valeur >= 0 && $valeur <= 2 ) ? $valeur : 0;
      }
      else if ( $attribut == "newsletter" || $attribut == "tauxReduction" ) {

        $this->$attribut = $valeur;
      }
      else {

        throw new Exception("Error cannot acces '$attribut'", 2);
      }
    }


    public function affiche() : void {

      //test d'appel de la méthode
      if(TEST == 1){ echo "appel :".__METHOD__."\n";}

      parent::affiche();

      echo "newsletter : ".$this->newsletter."\n";

      if( $this->genre == 1) {

        echo "genre : homme\n";
      }
      elseif ( $this->genre == 2) {

        echo "genre : femme\n";
      }
      else {

        echo "genre : autre\n";
      }

      echo "tauxReduction : ".$this->tauxReduction."\n";

    }

  }
?>
