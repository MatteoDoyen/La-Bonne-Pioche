<?php

class Commande {
  private $refCommande;
  private $refClient;
  private $dateCommande;
  private $dateRecup;
  private $etat;
  private $livraison;
  private $prix;


  public function __construct(int $refCommande, int $refClient,string $dateCommande, string $dateRecup, string $etat, $livriason,float $prix)
  {
    $this->refCommande = $refCommande;
    $this->refClient = $refClient;
    $this->dateCommande = $dateCommande;
    $this->dateRecup = $dateRecup;
    $this->etat = $etat;
    $this->livriason = $livriason;
    $this->prix = $prix;
  }

  //méthode get
  public function __get(string $attribut) {
      return $this -> $attribut;
  }

      //méthode set
  public function __set(string $attribut, $valeur){

        //test d'appel de la méthode
        // if(TEST == 1){ echo "appel :".__METHOD__."($attribut)\n";}

        //retourne une erreur si le nom d'attribut pris en paramètre est inéxistant
        if ($attribut != "refCommande" && $attribut != "refClient" && $attribut != "dateCommande" && $attribut != "dateRecup" && $attribut != "etat" && $attribut != "livriason" && $attribut != "prix") {

          throw new Exception("Error cannot acces '$attribut'", 1);
        }

        $this->$attribut = $valeur;
  }

  function dateDiff($date1, $date2){
      $diff = abs($date1 - $date2);
      $retour = array();

      $tmp = $diff;
      $retour['second'] = $tmp % 60;
      $tmp = floor( ($tmp - $retour['second']) /60 );
      $retour['minute'] = $tmp % 60;
      $tmp = floor( ($tmp - $retour['minute'])/60 );
      $retour['hour'] = $tmp % 24;
      $tmp = floor( ($tmp - $retour['hour'])  /24 );
      $retour['day'] = $tmp;

      return $retour;
  }

  public function isAnnulable(): bool {
    $dateR = strtotime($dateRecup);
    $now = time();

    if(dateDiff($now, $dateR)>2){
        return true;
    }
    else
    {
        return false;
    }
  }



}

?>
