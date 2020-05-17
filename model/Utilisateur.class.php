<?php

  //TEST = 1 activer l'affichage de l'appel de la méthode
  //TEST = ... supprimer l'affichage de l'appel
  define("TEST",1);

  class Utilisateur {

    private int $refUtilisateur; //la réference est automatiquement attribué par le sysème
    private string $nom;
    private string $prenom;
    private string $adresseMail;
    private string $motDePasse;
    private string $etat; //pour l'instant qu'un simple type string, classe enumérer etat

    //constructeur de base
    public function __construct( int $refUtilisateur, string $nom, string $prenom, string $adresseMail, string $motDePasse, string $etat) {

      //test d'appel de la méthode
      if(TEST == 1){ echo "appel : ".__METHOD__."\n";}

      $this->refUtilisateur = $refUtilisateur; //à modifier par la suite
      $this->nom = $nom;
      $this->prenom = $prenom;
      $this->adresseMail = $adresseMail;
      $this->motDePasse = $motDePasse;
      $this->etat = $etat;
    }

    //méthode get
    public function __get(string $attribut) {

      //test d'appel de la méthode
      if(TEST == 1){ echo "appel : ".__METHOD__."($attribut)\n";}

      //retourne une erreur si le nom d'attribut pris en paramètre est inéxistant
      if ( $attribut != "refUtilisateur" && $attribut != "nom" && $attribut != "prenom" && $attribut != "adresseMail" && $attribut != "motDePasse" && $attribut != "etat" ) {

        throw new Exception("Error cannot acces '$attribut'", 1);
      }

      return $this->$attribut;
    }


    //méthode set
    public function __set(string $attribut, string $valeur){

      //test d'appel de la méthode
      if(TEST == 1){ echo "appel :".__METHOD__."($attribut)\n";}

      //retourne une erreur si le nom d'attribut pris en paramètre est inéxistant
      if ( $attribut != "refUtilisateur" && $attribut != "nom" && $attribut != "prenom" && $attribut != "adresseMail" && $attribut != "motDePasse" && $attribut != "etat" ) {

        throw new Exception("Error cannot acces '$attribut'", 1);
      }

      $this->$attribut = $valeur;
    }

    //fonction d'affichage
    public function affiche() : void {

      //test d'appel de la méthode
      if(TEST == 1){ echo "appel :".__METHOD__."\n";}

      echo "refUtilisateur : ".$this->refUtilisateur."\n"."nom : ".$this->nom."\n"."prenom : ".$this->prenom."\n"."adresseMail : ".$this->adresseMail."\n"."motDePasse : ".$this->motDePasse."\n"."etat : ".$this->etat."\n";
      //echo "etatUtilisateur : ".$this->etatUtilisateur."\n";
    }

  }
?>
