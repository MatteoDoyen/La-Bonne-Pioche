<?php
require_once(dirname(__FILE__).'/Produit.class.php');

// Le Data Access Objet
class ProduitDAO {
  private $db;

  // Constructeur chargé d'ouvrir la BD
  function __construct() {
    $this->db = new PDO('sqlite:'.dirname(__FILE__).'/../data/produits.csv','',''); //SÉPARATEURS À VÉRIFIER
    $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  }

  // Accès à un produit
  function get(int $id) : Produit {
    $req = "SELECT * FROM produits WHERE id = '$id'";
    $sth = $this->db->query($req);
    $resArray= $sth->fetchAll(PDO::FETCH_ASSOC);
    foreach($resArray as $row)
    {
      $produit = new Produit($row['stock'],$row['id'],$row['libelle'],$row['fabricant'],$row['rayon'],$row['famille'],
      $row['coef'],$row['description'],$row['origine'],$row['caracteristiques'],$row['prix_u'],$row['url_img']);
    }
    return $produit;
  }

}

?>
