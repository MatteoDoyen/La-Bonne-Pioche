<?php

// Description d'un produit
class Produit {
  private $stock;
  private $refProduit;
  private $libelle;
  private $fabricant;
  private $rayon;
  private $famille;
  private $coef;
  private $description;
  private $origine;
  private $caracteristiques;
  private $prixU;
  private $urlImg;
  private $quantiteU;
  private $unite;
  private $active;
  // Chemin URL à ajouter pour avoir l'image du produit
  private const URL = '../data/img/img_produits/';

  function __construct( $stock=0, $refProduit=0,string $libelle='',string $fabricant='',
  string $rayon='',string $famille='', $coef=0, string $description='',
  string $origine='', string $caracteristiques='',float $prixU=0, string $urlImg='',
  $quantiteU=0, $unite='', $active=1) {
      $this -> stock = $stock;
      $this -> refProduit =  $refProduit;
      $this -> libelle =  $libelle;
      $this -> fabricant =  $fabricant;
      $this -> rayon =  $rayon;
      $this -> famille = $famille;
      $this -> coef = $coef;
      $this -> description = $description;
      $this -> origine = $origine;
      $this -> caractéristiques = $caracteristiques;
      $this -> prixU = $prixU;
      $this -> urlImg = $urlImg;
      $this -> quantiteU = $quantiteU;
      $this -> unite = $unite;
      $this -> active = 1;
  }

  public function __get($libelle){
    if($libelle == "urlImg"){
      return Produit::URL.$this->$libelle;
    }
    else {
      return $this -> $libelle;
    }
  }

  public function __set(string $attribut, $valeur){

      //test d'appel de la méthode
      // if(TEST == 1){ echo "appel :".__METHOD__."($attribut)\n";}

      //retourne une erreur si le nom d'attribut pris en paramètre est inéxistant
      if ( $attribut != "stock" && $attribut != "refProduit" && $attribut != "libelle" && $attribut != "fabricant" && $attribut != "rayon" && $attribut != "famille" && $attribut != "coef" && $attribut != "description" && $attribut !="caractéristiques" && $attribut != "prixU" && $attribut = "urlImg" && $attribut != "quantiteU" && $attribut != "unite" && $attribut != "active") {

        throw new Exception("Error cannot acces '$attribut'", 1);
      }

      $this->$attribut = $valeur;
  }
}

?>
