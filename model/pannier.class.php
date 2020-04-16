<?php
  class Pannier {
    private int $refPanier;
    private string $intitule;
    private int $prix;
    private int $nombrePersonne;

    function __construct(int $refPanier,string $intitule,int $prix,int $nombrePersonne=1)
    {
      $this->refPanier=$refPanier;
      $this->intitule=$intitule;
      $this->prix=$prix;
      $this->nombrePersonne=$nombrePersonne;
    }

    function __get($name) {

      return $this->$name;
      
    }
  }
 ?>
