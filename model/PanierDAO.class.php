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
  function get(int $refPanier) : Panier {
    $req = "SELECT * FROM paniers WHERE refPanier = '$refPanier' AND active = 1";
    $sth = $this->db->query($req);
    $resArray= $sth->fetchAll(PDO::FETCH_ASSOC);
    foreach($resArray as $row)
    {
      $panier = new Panier($row['libelle'],$row['refPanier'],$row['coefficient'],$row['prix'],$row['image'],$row['nbBocaux'],$row['active']);
    }
    return $panier;
  }

  function getAllActive() : Array {
    $req = "SELECT * FROM paniers WHERE active = 1 order by libelle";
    $sth = $this->db->query($req);
    $resArray= $sth->fetchAll(PDO::FETCH_ASSOC);

    $retour = array();
    foreach($resArray as $row)
    {
      $retour[] = new Panier($row['libelle'],$row['refPanier'],$row['coefficient'],$row['prix'],$row['image'],$row['nbBocaux'],$row['active']);
    }
    return $retour;
  }



  function getMaxRefPanier() : int{
    try {
      $r = $this->db->query("SELECT MAX(refPanier) FROM paniers");
      $res = $r->fetchAll();
    } catch (PDOException $e) {
      die("PDO Error :".$e->getMessage());
    }
    return ($res[0][0]);
  }

  function getComposition(int $refPanier) : array{
    $produit = new ProduitDAO();
    $r = $this->db->query("SELECT * FROM produits_paniers WHERE refPanier = '$refPanier'");
    $res = $r->fetchAll(PDO::FETCH_ASSOC);
    $idcomposition = array();
    foreach($res as $row)
    {
      $clee = $row['refProduit'].' '.$row['quantite'];
      $prod = $produit->get($row['refProduit']);
      $idcomposition[$clee]=$prod;
    }
    return $idcomposition;
  }



function insertPanier($libelle, $coefficient, $prix, $image, $nbBocaux, $active) {

  $refPanier= $this->getMaxRefPanier()+1;

  $sql = "INSERT INTO paniers VALUES($refPanier,'$libelle',$coefficient,$prix,'$image', $nbBocaux, $active)";

  $this->db->query($sql);
}



function insertProduitPanier($refProduit, $refPanier, $quantite) {

    $sql = "INSERT INTO produits_paniers VALUES($refProduit, $refPanier,$quantite)";
    $this->db->query($sql);
  }



function desactiverPanier($refPanier) {
    $sql = "UPDATE paniers SET active = 0 WHERE refPanier = '$refPanier'";
    return $this->db->query($sql);
}

function activerPanier($refPanier) {
    $sql = "UPDATE paniers SET active = 1 WHERE refPanier = '$refPanier'";
    return $this->db->query($sql);
}



function updatePanier($refPanier,$modifs){

    foreach ($modifs as $key => $value) {
      if(!is_string($value))
      {
        $sql = "UPDATE paniers SET $key= $value WHERE refPanier = $refPanier";
      }
      else {
        $sql = "UPDATE paniers SET $key= '$value' WHERE refPanier = $refPanier";
      }
      $this->db->query($sql);
    }
  }

function getPanierProduit($refProduit)
{
    $nombrePanier=null;
    $sql = "SELECT distinct pa.refPanier from produits_paniers pr,paniers pa where pr.refProduit = $refProduit and pr.refPanier=pa.refPanier and active =1";
    $r = $this->db->query($sql);
    $nombrePanier = $r->fetchAll(PDO::FETCH_ASSOC);
    return $nombrePanier;
}


}

?>
