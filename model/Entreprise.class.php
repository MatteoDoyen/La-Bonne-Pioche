<?php

  /**
   *
   */
  class Entreprise
  {

    private $nom;
    private $ref_Entreprise;
    private $numero_Siret;

    function __construct(string $nom,string $numero_Siret,int $ref_Entreprise)
    {
      $this-> nom = nom;
    }
  }




 ?>
