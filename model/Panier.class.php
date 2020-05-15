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
}

?>
