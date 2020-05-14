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
  private $caractéristiques;
  private $prix_u;
  // Chemin URL à ajouter pour avoir l'image du produit
  private const URL = '../data/img/img_produits/';

  function __construct(int $id=0,string $author='',string $title='',string $cover='',string $mp3='',string $category='') {
      $this -> id =  $id;
      $this -> author =  $author;
      $this -> title =  $title;
      $this -> cover =  $cover;
      $this -> mp3 = $mp3;
      $this -> category = $category;
  }

  public function __get($name){
    if($name == "cover"){
      return Music::URL.'img/'.$this->$name;
    }
    else if($name == "mp3"){
      return Music::URL."mp3/".$this->$name;
    }
    else {
      return $this -> $name;
    }
  }

}

?>
