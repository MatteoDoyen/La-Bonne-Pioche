<?php

  class Entreprise  {

    private $nom;
    private $refEntreprise;
    private $numeroSiret;

    function __construct(int $refEntreprise,string $nom,string $numeroSiret)
    {
      $this-> nom = $nom;
      $this-> numeroSiret = $numeroSiret;
      $this-> refEntreprise = $refEntreprise;
    }

    public function __get(string $attribut)
    {
      if($attribut != "nom" || $attribut != "numeroSiret" || $attribut != "refEntreprise")
      {
          throw new Exception("Error cannot acces '$attribut'", 1);
      }

      return $this->$attribut;
    }

    public function __set(string $attribut , $valeur)
    {
      if ( $attribut != "nom" && $attribut != "numeroSiret" && $attribut != "refEntreprise") {

        throw new Exception("Error cannot acces '$attribut'", 1);
      }

      $this->$attribut = $valeur;
    }

  }
 ?>
