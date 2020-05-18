<?php

  require_once("Utilisateur.class.php");

  class Employe extends Utilisateur {

    private bool $statut; //true -> Gestionnaire et false -> Employe

    //constructeur
    public function __construct(int $refUtilisateur, string $nom, string $prenom, string $adresseMail, string $motDePasse, string $etat, bool $statut){

      //test d'appel de la méthode
      if(TEST == 1){ echo "appel : ".__METHOD__."\n";}

      //construction de l'objet mère Utilisateur
      parent::__construct($refUtilisateur, $nom, $prenom, $adresseMail, $motDePasse, $etat);

      $this->statut = $statut;
    }

    //méthode get
    public function __get(string $attribut) {

      //test d'appel de la méthode
      if(TEST == 1){ echo "appel : ".__METHOD__."($attribut)\n";}

      //code d'erreur
      $retour = -1;

      //penser à regarder comment appeler les méthodes magiques
      //retourne une erreur si le nom d'attribut pris en paramètre est inéxistant ( classe mère )
      if( $attribut == "refUtilisateur" || $attribut == "nom" || $attribut == "prenom" || $attribut == "adresseMail" || $attribut == "motDePasse" || $attribut == "etat" ){

        $retour = parent::__get($attribut);
      }
      //retourne une erreur si le nom d'attribut pris en paramètre est inéxistant ( classe fille )
      else if ( $attribut == "statut" ) {

        $retour = $this->$attribut;
      }
      else {

        throw new Exception("Error cannot acces '$attribut'", 2);
      }

      return $retour;
    }


    //méthode set
    public function __set(string $attribut, string $valeur){

      //test d'appel de la méthode
      if(TEST == 1){ echo "appel :".__METHOD__."($attribut)\n";}

      //penser à regarder comment appeler les méthodes magiques
      //retourne une erreur si le nom d'attribut pris en paramètre est inéxistant ( classe mère )
      if( $attribut == "refUtilisateur" || $attribut == "nom" || $attribut == "prenom" || $attribut == "adresseMail" || $attribut == "motDePasse" || $attribut == "etat"){

        parent::__set($attribut, $valeur);
      }
      //retourne une erreur si le nom d'attribut pris en paramètre est inéxistant ( classe fille )
      else if ( $attribut == "statut" ) {

        $this->$attribut = $valeur;
      }
      else {

        throw new Exception("Error cannot acces '$attribut'", 2);
      }
    }

    public function setStatut() : void {

      //test d'appel de la méthode
      if(TEST == 1){ echo "appel :".__METHOD__."\n";}

      $this->statut = ( $this->statut ) ? false : true ;
    }

    //sert au debug
    public function affiche() : void {

      //test d'appel de la méthode
      if(TEST == 1){ echo "appel :".__METHOD__."\n";}

      parent::affiche();

      echo "statut : ".$this->statut."\n";
    }

  }

?>
