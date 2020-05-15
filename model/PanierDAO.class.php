<?php
require_once(dirname(__FILE__).'/Panier.class.php');

// Le Data Access Objet
class PanierDAO {
  private $db;

  // Constructeur chargé d'ouvrir la BD
  function __construct() {
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
  }

  // Accès à un produit
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
}

?>
