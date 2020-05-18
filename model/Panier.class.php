<?php

class Panier {
  private $libelle;
  private $id_Panier;
  private $coefficient;
  private $prix;
  private $image;
  private const URL = '../data/img/img_paniers/';

  public function __construct(string $libelle, int $id_Panier, float $coefficient, float $prix, string $image)
  {
    $this->libelle = $libelle;
    $this->id_Panier = $id_Panier;
    $this->prix = $coefficient;
    $this->coefficient = $coefficient;
    $this->prix = $prix;
    $this->image = $image;
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

  public function __set(string $attribut, $valeur){

        //test d'appel de la méthode
        // if(TEST == 1){ echo "appel :".__METHOD__."($attribut)\n";}

        //retourne une erreur si le nom d'attribut pris en paramètre est inéxistant
        if ( $attribut != "libelle" && $attribut != "refPanier" && $attribut != "intitule" && $attribut != "prix" && $attribut != "nombrePersonne" ) {

          throw new Exception("Error cannot acces '$attribut'", 1);
        }

        $this->$attribut = $valeur;
      }
}

?>
