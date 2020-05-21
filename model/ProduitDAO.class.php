<?php
require_once(dirname(__FILE__).'/Produit.class.php');

// Le Data Access Objet
class ProduitDAO {
  private $db;

  // Constructeur chargé d'ouvrir la BD
  function __construct() {
    $database = 'sqlite:'.dirname(__FILE__).'/../data/database.db';
    try {
      $this->db = new PDO($database);
      if (!$this->db) {
        die ("Database error");
      }
    } catch (PDOException $e) {
      die("PDO Error :".$e->getMessage()." $database\n");
    }

    $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //$this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
  }

  // Accès à un produit
  function get(int $refProduit) : Produit {
    $req = "SELECT * FROM produits WHERE refProduit = '$refProduit'";
    $sth = $this->db->query($req);
    $resArray= $sth->fetchAll(PDO::FETCH_ASSOC);
    foreach($resArray as $row)
    {
      $produit = new Produit($row['stock'],$row['refProduit'],$row['libelle'],$row['fabricant'],$row['rayon'],$row['famille'],
      $row['coef'],$row['description'],$row['origine'],$row['caracteristiques'],$row['prixU'],$row['urlImg'],$row['quantiteU'],$row['unite']);
    }
    return $produit;
  }

  function getNbElements() : int{
    try {
      $r = $this->db->query("SELECT COUNT(*) FROM produits");
      $res = $r->fetchAll();
    } catch (PDOException $e) {
      die("PDO Error :".$e->getMessage());
    }
    return ($res[0][0]);
  }

  public function insertProduit($stock, $refProduit, $libelle, $fabricant, $rayon, $famille, $coef, $description,
    $origine, $caracteristiques, $prixU, $urlImg, $quantiteU, $unite) {
    $sql = "INSERT INTO produits VALUES($stock, $refProduit,'$libelle','$fabricant', '$rayon', '$famille', $coef, '$description',
            '$origine', '$caracteristiques', $prixU,'$urlImg', $quantiteU, '$unite')";

    print_r($sql);

    $this->db->query($sql);


  }

  //Suppression d'un produit dans la bdd
  //ATTENTION PRAGMA foreign_keys=ON
  public function deleteProduit($refProduit) {
      $this->db->exec('PRAGMA foreign_keys=ON');
      $sql = "DELETE FROM produits WHERE refProduit = '$refProduit'";
      return $this->db->query($sql);
  }

//À revoir
  /*public function modifyProduit($refProduit, $arrayModifs){
    foreach ($arrayModifs as $ $modif) {
      $sql = "UPDATE produits SET '$modif' WHERE refProduit = '$refProduit'";
      return = $this->db->query($sql);
    }
  }*/

}

?>
