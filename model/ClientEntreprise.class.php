<?php

  require_once("Client.class.php");

  class ClientEntreprise extends Client {

    //constructeur
    public function __construct(int $refUtilisateur, string $nom, string $prenom, string $adresseMail, string $motDePasse, string $etat, bool $newsletter, bool $genre, string $numeroTelephone, float $tauxReduction){

      //test d'appel de la méthode
      if(TEST == 1){ echo "appel : ".__METHOD__."\n";}

      //construction de l'objet mère Utilisateur
      parent::__construct($refUtilisateur, $nom, $prenom, $adresseMail, $motDePasse, $etat, $newsletter, $genre, $numeroTelephone, $tauxReduction);
    }


    public function __get(string $attribut) {

      if ( $attribut != "refUtilisateur" && $attribut != "nom" && $attribut != "prenom" && $attribut != "adresseMail" && $attribut != "motDePasse" && $attribut != "etat" && $attribut != "newsletter" && $attribut != "genre" && $attribut != "numeroTelephone" && $attribut != "tauxReduction" ) {

        throw new Exception("Error cannot acces '$attribut'", 3);
      }

      return parent::__get($attribut);
    }


    public function __set(string $attribut, $valeur) {

      if ( $attribut != "refUtilisateur" && $attribut != "nom" && $attribut != "prenom" && $attribut != "adresseMail" && $attribut != "motDePasse" && $attribut != "etat" && $attribut != "newsletter" && $attribut != "genre" && $attribut != "numeroTelephone" && $attribut != "tauxReduction" ) {

        throw new Exception("Error cannot acces '$attribut'", 3);
      }

      parent::__set($attribut, $valeur);
    }


  }

?>
