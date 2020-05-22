<?php

class Panier {
  private $libelle;
  private $refPanier;
  private $coefficient;
  private $prix;
  private $image;
  private const URL = '../data/img/img_paniers/';
  private $nbPersonne;
  private $nbBocaux;

  public function __construct(string $libelle, int $refPanier, float $coefficient, float $prix, string $image, int $nbBocaux)
  {
    $this->libelle = $libelle;
    $this->refPanier = $refPanier;
    $this->coefficient = $coefficient;
    $this->prix = $prix;
    $this->image = $image;
    $this->nbPersonne = 1;
    $this->nbBocaux = $nbBocaux;
  }

  //méthode get
  public function __get(string $attribut) {
    if($attribut == "image"){
        return Panier::URL.$this->$attribut;
    }
    else {
      return $this -> $attribut;
    }
  }

      //méthode set
      public function __set(string $attribut, $valeur){

        //test d'appel de la méthode
        // if(TEST == 1){ echo "appel :".__METHOD__."($attribut)\n";}

        //retourne une erreur si le nom d'attribut pris en paramètre est inéxistant
        if ( $attribut != "libelle" && $attribut != "refPanier" && $attribut != "intitule" && $attribut != "prix" && $attribut != "nombrePersonne" && $attribut != "nbBocaux") {

          throw new Exception("Error cannot acces '$attribut'", 1);
        }

        $this->$attribut = $valeur;
      }
}

?>
