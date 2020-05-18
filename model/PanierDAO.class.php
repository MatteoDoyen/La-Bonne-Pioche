<?php
require_once(dirname(__FILE__).'/Panier.class.php');
require_once(dirname(__FILE__).'/Produit.class.php');
require_once(dirname(__FILE__).'/ProduitDAO.class.php');

// Le Data Access Objet
class PanierDAO {
  private $db;
  private $dbp;
  private $dbc;

  // Constructeur chargé d'ouvrir la BD
  function __construct() {
    //db paniers
    $database = 'sqlite:'.dirname(__FILE__).'/../data/paniers.db';
    try {
      $this->db = new PDO($database);
      if (!$this->db) {
        die ("Database error");
      }
    } catch (PDOException $e) {
      die("PDO Error :".$e->getMessage()." $database\n");
    }
    $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    //db produits
    $database_prod = 'sqlite:'.dirname(__FILE__).'/../data/produits.db';
    try {
      $this->dbp = new PDO(  $database_prod);
      if (!$this->dbp) {
        die ("Database error");
      }
    } catch (PDOException $e) {
      die("PDO Error :".$e->getMessage()." $database_prod\n");
    }
    $this->dbp->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    //db composition
    $database_compo = 'sqlite:'.dirname(__FILE__).'/../data/produits_paniers.db';
    try {
      $this->dbc = new PDO($database_compo);
      if (!$this->dbc) {
        die ("Database error");
      }
    } catch (PDOException $e) {
      die("PDO Error :".$e->getMessage()." $database_compo\n");
    }
    $this->dbc->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  }

  // Accès à un panier
  function get(int $id_Panier) : Panier {
    $req = "SELECT * FROM paniers WHERE id_Panier = '$id_Panier'";
    $sth = $this->db->query($req);
    $resArray= $sth->fetchAll(PDO::FETCH_ASSOC);
    foreach($resArray as $row)
    {
      $panier = new Panier($row['libelle'],$row['id_Panier'],$row['coefficient'],$row['prix'],$row['image']);
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

  function getComposition(int $id_Panier) : array{+
    $produit = new ProduitDAO();
    $r = $this->dbc->query("SELECT id_produit FROM produits_paniers WHERE id_panier = $id_Panier");
    $res = $r->fetchAll(PDO::FETCH_ASSOC);
    print_r($res);
    $idcomposition = array();
    foreach($res as $row)
    {
      array_push($idcomposition, $row['id_produit']);
    }
    print_r($idcomposition);
    $composition = array();
    foreach ($idcomposition as $id)
    {
      array_push($composition, $produit->get($id));
    }
    print_r($composition);
    return $composition;
  }


}

?>
