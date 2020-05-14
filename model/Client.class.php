<?php

  require_once("Utilisateur.class.php");

  class Client extends Utilisateur {

    private int $promotion;
    private bool $newsletter;
    private bool $genre;      //pour l'instant [1] => homme / [0] => femme
    private string $numeroTelephone;
    private float $tauxReduction;


    //constructeur
    public function __construct(int $refUtilisateur, string $nom, string $prenom, string $adresseMail, string $motDePasse, int $promotion, bool $newsletter, string $numeroTelephone, float $tauxReduction){

      //test d'appel de la méthode
      if(TEST == 1){ echo "appel : ".__METHOD__."($attribut)\n";}

      //construction de l'objet mère Utilisateur
      parent::__construct(int $refUtilisateur, string $nom, string $prenom, string $adresseMail, string $motDePasse);

      $this->promotion = $promotion;
      $this->newsletter = $newsletter;
      $this->genre = $genre;
      $this->numeroTelephone = $numeroTelephone

    }

    //méthode get
    public function __get(string $attribut) {

      //test d'appel de la méthode
      if(TEST == 1){ echo "appel : ".__METHOD__."($attribut)\n";}

      return $this->$attribut;
    }


    //méthode set
    public function __set(string $attribut, string $valeur){

      //test d'appel de la méthode
      if(TEST == 1){ echo "appel :".__METHOD__."($attribut)\n";}

      $this->$attribut = $valeur;
    }

  }
?>
