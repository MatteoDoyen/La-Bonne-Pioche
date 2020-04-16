<?php

  //TEST = 1 activer l'affichage de l'appel de la méthode
  //TEST = 0 supprimer l'affichage de l'appel
  define("TEST",1);


    class Panier {

      private int $refPanier;
      private string $intitule;
      private float $prix;
      private int $nombrePersonne;

      //constructeur
      /*
      nombrePersonne prend 1 comme valeur par défaut,
      s'il n'est pas préciser lors de la construction de l'objet
      */
      public function __construct(int $refPanier, string $intitule, float $prix, int $nombrePersonne=1)
      {
        //test d'appel de la méthode
        if(TEST == 1){ echo "appel : ".__METHOD__."($attribut)\n";}

        $this->refPanier = $refPanier;
        $this->intitule = $intitule;
        $this->prix = $prix;
        $this->nombrePersonne = $nombrePersonne;
      }

      //méthode get
      public function __get(string $attribut) {

        //test d'appel de la méthode
        if(TEST == 1){ echo "appel : ".__METHOD__."($attribut)\n";}

        //retourne une erreur si le nom d'attribut pris en paramètre est inéxistant
        if ( $attribut != "refPanier" && $attribut != "intitule" && $attribut != "prix" && $attribut != "nombrePersonne" ) {

          throw new Exception("Error cannot acces '$attribut'", 1);
        }

        return $this->$attribut;
      }

      //méthode set
      public function __set(string $attribut, string $valeur){

        //test d'appel de la méthode
        if(TEST == 1){ echo "appel :".__METHOD__."($attribut)\n";}

        //retourne une erreur si le nom d'attribut pris en paramètre est inéxistant
        if ( $attribut != "refPanier" && $attribut != "intitule" && $attribut != "prix" && $attribut != "nombrePersonne" ) {

          throw new Exception("Error cannot acces '$attribut'", 1);
        }

        $this->$attribut = $valeur;
      }

    }

 ?>
