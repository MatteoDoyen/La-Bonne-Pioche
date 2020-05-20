<?php

  class Entreprise  {

    private $nom;
    private $ref_Entreprise;
    private $numero_Siret;

    function __construct(string $nom,string $numero_Siret,int $ref_Entreprise)
    {
      $this-> nom = $nom;
      $this-> numero_Siret = $numero_Siret;
      $this-> ref_Entreprise = $ref_Entreprise;
    }

    public function __get(string $attribut)
    {
      if($attribut != "nom" || $attribut != "numero_Siret" || $attribut != "ref_Entreprise")
      {
          throw new Exception("Error cannot acces '$attribut'", 1);
      }

      return $this->$attribut;
    }

    public function __get(string $attribut , $valeur)
    {
      if ( $attribut != "nom" && $attribut != "numero_Siret" && $attribut != "ref_Entreprise") {

        throw new Exception("Error cannot acces '$attribut'", 1);
      }

      $this->$attribut = $valeur;
    }

  }
 ?>
