<?php

// Description d'un produit
class Produit {
  private $stock;
  private $id;
  private $libelle;
  private $fabricant;
  private $rayon;
  private $famille;
  private $coef;
  private $description;
  private $origine;
  private $caracteristiques;
  private $prix_u;
  private $url_img;
  private $quantite_u;
  private $unite;
  // Chemin URL à ajouter pour avoir l'image du produit
  private const URL = '../data/img/img_produits/';

  function __construct( $stock=0, $id=0,string $libelle='',string $fabricant='',
  string $rayon='',string $famille='', $coef=0, string $description='',
  string $origine='', string $caracteristiques='',  $prix_u, string $url_img='',
  $quantite_u, $unite) {
      $this -> stock = $stock;
      $this -> id =  $id;
      $this -> libelle =  $libelle;
      $this -> fabricant =  $fabricant;
      $this -> rayon =  $rayon;
      $this -> famille = $famille;
      $this -> coef = $coef;
      $this -> description = $description;
      $this -> origine = $origine;
      $this -> caractéristiques = $caracteristiques;
      $this -> prix_u = $prix_u;
      $this -> url_img = $url_img;
      $this -> quantite_u = $quantite_u;
      $this -> unite = $unite;
  }

  public function __get($libelle){
    if($libelle == "url_img"){
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
      if ( $attribut != "stock" && $attribut != "id" && $attribut != "libelle" && $attribut != "fabricant" && $attribut != "rayon" && $attribut != "famille" && $attribut != "coef" && $attribut != "description" && $attribut !="caractéristiques" && $attribut != "prix_u" && $attribut = "url_img") {

        throw new Exception("Error cannot acces '$attribut'", 1);
      }

      $this->$attribut = $valeur;
  }
}

?>
