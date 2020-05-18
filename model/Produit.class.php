<?php

class Produit {

  /**
   * Intitule du produit
   * @var string
   */
  private $intitule;

  /**
   * Type de produit
   * @var string
   */
  private $type;

  /**
   * Groupe auquel le produit appartient
   * @var string
   */
  private $groupe;

  /**
   * Url de l'image du produit
   * @var string
   */
  private $image;

  /**
   * Lieu de production du produit
   * @var string
   */
  private $lieu_production;

  /**
   * Origine/histoire du produit
   * @var string
   */
  private $origine;

  /**
   * Descriptif du produit
   * @var string
   */
  private $description;

  /**
   * Constructeur de la classe Produit
   * @param int    $id              Identifiant du produit
   * @param string $intitule        Intitule du produit
   * @param string $type            Type du produit
   * @param string $groupe          Groupe du produit
   * @param string $image           Url de l'image du produit
   * @param string $lieu_production Lieu de production du produit
   * @param string $origine         Origine du produit
   * @param string $description     Description du produit
   */
  function __construct(string $intitule, string $type, string $groupe, string $image, string $lieu_production, string $origine, string $description) {
    $this->intitule = $intitule;
    $this->type = $type;
    $this->groupe = $groupe;
    $this->image = $image;
    $this->lieu_production = $lieu_production;
    $this->origine = $origine;
    $this->description = $description;
  }

  /**
   * Retourne l'intitule du produit
   * @return string
   */
  function getIntitule() : string {
    return $this->intitule;
  }

  /**
   * Retourne le type du produit
   * @return string
   */
  function getType() : string {
    return $this->type;
  }

  /**
   * Retourne le groupe du produit
   * @return string
   */
  function getGroupe() : string {
    return $this->groupe;
  }

  /**
   * Retourne l'url de l'image du produit
   * @return string
   */
  function getImage() : string {
    return $this->image;
  }

  /**
   * Retourne le lieu de prouction du produit
   * @return string
   */
  function getLieuProduction() : string {
    return $this->lieu_production;
  }

  /**
   * Retourne l'origine du produit
   * @return string
   */
  function getOrigine() : string {
    return $this->origine;
  }

  /**
   * Retourne le descriptif du produit
   * @return string
   */
  function getDescription() : string {
    return $this->description;
  }

}





?>
