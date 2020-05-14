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
  // Chemin URL à ajouter pour avoir l'image du produit
  private const URL = '../data/img/img_produits/';

  function __construct(int $stock=0,int $id=0,string $libelle='',string $fabricant='',
  string $rayon='',string $famille='',float $coef=0, string $description='',
  string $origine='', string $caracteristiques='', float $prix_u, string $url_img='') {
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
  }

  public function __get($libelle){
    if($libelle == "url_img"){
      return Produit::URL.$this->$libelle;
    }
    else {
      return $this -> $libelle;
    }
  }

}

?>
