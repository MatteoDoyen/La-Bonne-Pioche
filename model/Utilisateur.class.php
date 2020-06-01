<?php

  //TEST = 1 activer l'affichage de l'appel de la méthode
  //TEST = ... supprimer l'affichage de l'appel
  define("TEST",1);
  // /!\ fonctionne pour toute l'arborescence  de classe

  class Utilisateur {

    private int $refUtilisateur;      //la réference est inqué dans la base de donnée
    private string $nom;
    private string $prenom;
    private string $adresseMail;
    private string $motDePasse;
    private string $etat;             //pour l'instant qu'un simple type string, classe enuméré etat
    private string $numeroTelephone;

    //public static int $nbrUtilisateur;

    //constructeur de base
    public function __construct( int $refUtilisateur, string $nom, string $prenom, string $adresseMail, string $motDePasse, string $etat = "enAttente", string $numeroTelephone ) {

      //test d'appel de la méthode
      if(TEST == 1){ echo "appel : ".__METHOD__."\n";}

      $this->refUtilisateur = $refUtilisateur;
      $this->nom = $nom;
      $this->prenom = $prenom;
      $this->adresseMail = $adresseMail;
      $this->motDePasse = $motDePasse;
      $this->numeroTelephone = $numeroTelephone;

      //Utilisation de l'attribut etat comme un type énuméré filtre le parmetre de construction
      $this->etat = ($etat != "enAttente" && $etat != "actif" && $etat != "desactive" && $etat != "supprime") ? "enAttente" : $etat;

      //incrémentation du nombre de d'utilisateur instancié
      //$nbrUtilisateur++;

    }

    //méthode get
    public function __get(string $attribut) {

      //test d'appel de la méthode
      if(TEST == 1){ echo "appel : ".__METHOD__."($attribut)\n";}

      //retourne une erreur si le nom d'attribut pris en paramètre est inéxistant
      if ( $attribut != "refUtilisateur" && $attribut != "nom" && $attribut != "prenom" && $attribut != "adresseMail" && $attribut != "motDePasse" && $attribut != "etat" && $attribut != "numeroTelephone" && $attribut != "nbrUtilisateur") {

        throw new Exception("Error cannot acces '$attribut'", 1);
      }

      return $this->$attribut;
    }


    //méthode set
    public function __set(string $attribut, $valeur){

      //test d'appel de la méthode
      if(TEST == 1){ echo "appel :".__METHOD__."($attribut)\n";}

      //retourne une erreur si le nom d'attribut pris en paramètre est inéxistant
      if ( $attribut != "refUtilisateur" && $attribut != "nom" && $attribut != "prenom" && $attribut != "adresseMail" && $attribut != "motDePasse" && $attribut != "etat" && $attribut != "numeroTelephone" ) {

        throw new Exception("Error cannot acces '$attribut'", 1);
      }

      //filtre de l'attribut etat
      if($attribut == "etat"){

          $this->$attribut = ($valeur != "enAttente" && $valeur != "actif" && $valeur != "desactive" && $valeur != "supprime") ? "enAttente" : $valeur;
      } else {

        $this->$attribut = $valeur;
      }

    }


    //fonction d'affichage
    public function affiche() : void {

      //test d'appel de la méthode
      if(TEST == 1){ echo "appel :".__METHOD__."\n";}

      echo "refUtilisateur : ".$this->refUtilisateur."\n"."nom : ".$this->nom."\n"."prenom : ".$this->prenom."\n"."adresseMail : ".$this->adresseMail."\n"."motDePasse : ".$this->motDePasse."\n"."etat : ".$this->etat."\n"."numeroTelephone : ".$this->numeroTelephone."\n";

      //echo "nbrUtilisateur : ".$this->nbrUtilisateur."\n";
    }
  }

  //Utilisateur::$nbrUtilisateur = 0;

?>
