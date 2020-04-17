<?php

  require_once("Utilisateur.class.php");

  class Client extends Utilisateur {

    private int $promotion;
    private bool $newsletter;
    private bool $genre;      //pour l'instant [1] => homme / [0] => femme
    private string $numeroTelephone;
    private float $tauxReduction;


    //penser à regarder openclassroom pour l'heritage
    public function __construct(int $promotion, bool $newsletter, string $numeroTelephone, float $tauxReduction){

      $this->promotion = $promotion;
      $this->newsletter = $newsletter;
      $this->genre = $genre;
      $this->numeroTelephone = $numeroTelephone

    }

  }
?>
