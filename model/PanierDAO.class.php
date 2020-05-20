<?php
require_once(dirname(__FILE__).'/Panier.class.php');
require_once(dirname(__FILE__).'/Produit.class.php');
require_once(dirname(__FILE__).'/ProduitDAO.class.php');

// Le Data Access Objet
class PanierDAO {
  private $db;

  // Constructeur chargé d'ouvrir la BD
  function __construct() {

    //db
    $database_compo = 'sqlite:'.dirname(__FILE__).'/../data/database.db';
    try {
      $this->db = new PDO($database_compo);
      if (!$this->db) {
        die ("Database error");
      }
    } catch (PDOException $e) {
      die("PDO Error :".$e->getMessage()." $database_compo\n");
    }
    $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  }

  // Accès à un panier
  function get(int $id_Panier) : Panier {
    $req = "SELECT * FROM paniers WHERE id_Panier = '$id_Panier'";
    $sth = $this->db->query($req);
    $resArray= $sth->fetchAll(PDO::FETCH_ASSOC);
    foreach($resArray as $row)
    {
      $panier = new Panier($row['libelle'],$row['id_Panier'],$row['coefficient'],$row['prix'],$row['image'],$row['nb_bocaux']);
    }
    return $panier;
  }

  function getNbElements() : int{
    try {
      $r = $this->db->query("SELECT COUNT(*) FROM paniers");
      $res = $r->fetchAll();
    } catch (PDOException $e) {
      die("PDO Error :".$e->getMessage());
    }
    return ($res[0][0]);
  }

  function getComposition(int $id_Panier) : array{
    $produit = new ProduitDAO();
    $r = $this->db->query("SELECT * FROM produits_paniers WHERE id_panier = $id_Panier");
    $res = $r->fetchAll(PDO::FETCH_ASSOC);
    $idcomposition = array();
    foreach($res as $row)
    {
      $clee = $row['id_produit'].' '.$row['quantite'];
      $prod = $produit->get($row['id_produit']);
      $idcomposition[$clee]=$prod;
    }
    return $idcomposition;
  }


}

?>
