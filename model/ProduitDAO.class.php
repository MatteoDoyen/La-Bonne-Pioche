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
    $this->db->exec('PRAGMA foreign_keys=ON');
    $this->db->exec('PRAGMA encoding="UTF-8"');
    $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //$this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
  }

  // Accès à un produit
  function get(int $refProduit) : Produit {
    $req = "SELECT * FROM produits WHERE refProduit = '$refProduit' AND active = 1";
    $sth = $this->db->query($req);
    $resArray= $sth->fetchAll(PDO::FETCH_ASSOC);
    foreach($resArray as $row)
    {
      $produit = new Produit($row['stock'],$row['refProduit'],$row['libelle'],$row['fabricant'],$row['rayon'],$row['famille'],
      $row['coef'],$row['description'],$row['origine'],$row['caracteristiques'],$row['prixU'],$row['urlImg'],$row['quantiteU'],$row['unite'],$row['active']);
    }
    return $produit;
  }

  function getAllActive() : Array {
    $req = "SELECT * FROM produits WHERE active = 1";
    $sth = $this->db->query($req);
    $resArray= $sth->fetchAll(PDO::FETCH_ASSOC);
    foreach($resArray as $row)
    {
      $produits[] = new Produit($row['stock'],$row['refProduit'],$row['libelle'],$row['fabricant'],$row['rayon'],$row['famille'],
      $row['coef'],$row['description'],$row['origine'],$row['caracteristiques'],$row['prixU'],$row['urlImg'],$row['quantiteU'],$row['unite'],$row['active']);
    }
    return $produits;
  }

  function getMaxRefProduit() : int{
    try {
      $r = $this->db->query("SELECT MAX(refProduit) FROM produits");
      $res = $r->fetchAll();
    } catch (PDOException $e) {
      die("PDO Error :".$e->getMessage());
    }
    return ($res[0][0]);
  }

  public function insertProduit(int $stock,string $libelle,string $fabricant,string $rayon,string $famille,float $coef,string $description,
    string $origine,string $caracteristiques,float $prixU,string $urlImg,int $quantiteU,string $unite,int $active) {


    $refProduit= $this->getMaxRefProduit()+1;

    $sql = "INSERT INTO produits VALUES($stock, $refProduit,'$libelle','$fabricant', '$rayon', '$famille', $coef, '$description',
            '$origine', '$caracteristiques', $prixU,'$urlImg', $quantiteU, '$unite', $active)";

    $this->db->query($sql);
  }

  public function desactiverProduit($refProduit) {
      $sql = "UPDATE produits SET active = 0 WHERE refProduit = '$refProduit'";
      return $this->db->query($sql);
  }

  public function activerProduit($refProduit) {
      $sql = "UPDATE produits SET active = 1 WHERE refProduit = '$refProduit'";
      return $this->db->query($sql);
  }

/*  public function deleteProduitPaniers($refProduit) {
      $sql = "DELETE FROM produits_paniers WHERE refProduit = '$refProduit'";
      $this->db->query($sql);
      $sql = "DELETE FROM produits WHERE refProduit = '$refProduit'";
      $this->db->query($sql);
  }*/

  public function updateProduit($refProduit,$modifs){

    foreach ($modifs as $key => $value) {
      if(!is_string($value))
      {
        $sql = "UPDATE produits SET $key= $value WHERE refProduit = $refProduit";
      }
      else {
        $sql = "UPDATE produits SET $key= '$value' WHERE refProduit = $refProduit";
      }
      $this->db->query($sql);
    }
  }

  /**
   * Renvoie un array composé du nom de chaque rayon, et pour chaque rayon le nom de chaque famille et du nombre d'élément de chaque famille
   */
  public function getRayonsFamilles() : array {
    $sth = $this->db->prepare("SELECT distinct rayon FROM Produits");
    $sth->execute();
    $rayons = $sth->fetchAll(PDO::FETCH_ASSOC);
    foreach ($rayons as $key => $value) {
      // Récupération de toutes les familles pour un rayon donné ainsi que nombre de produit par famille
      $sth = $this->db->prepare("SELECT famille, count(refProduit) as nb FROM Produits WHERE rayon = :rayon GROUP BY famille");
      $sth->execute(array(":rayon" => $value['rayon']));
      $famille = $sth->fetchAll(PDO::FETCH_ASSOC);
      array_push($rayons[$key], $famille);
      // Récupération du nombre total d'article par rayon
      $sth = $this->db->prepare("SELECT count(refProduit) as total FROM Produits WHERE rayon = :rayon");
      $sth->execute(array(":rayon" => $value['rayon']));
      $total = $sth->fetchAll(PDO::FETCH_ASSOC);
      array_push($rayons[$key], $total[0]['total']);
    }
    return $rayons;
  }

  /**
   * Renvoie un array composé d'objet Produit pour un $rayon donné.
   */
  public function getTousProduitsDunRayon($rayon) : array{
    $sth = $this->db->prepare("SELECT * from Produits where rayon = :rayon");
    $sth->execute(array(":rayon" => $rayon));
    $result = $sth->fetchAll(PDO::FETCH_ASSOC);
    $produits = array();
    foreach($result as $value) {
      $produit = new Produit($value['stock'],$value['refProduit'],$value['libelle'],$value['fabricant'],$value['rayon'],$value['famille'],
      $value['coef'],$value['description'],$value['origine'],$value['caracteristiques'],$value['prixU'],$value['urlImg'],$value['quantiteU'],$value['unite'],$value['active']);
      array_push($produits, $produit);
    }
    return $produits;
  }

  /**
   * Renvoie un array composé d'objet Produit pour un $rayon et une $famille donnés.
   */
  public function getTousProduitRayonsFamille($rayon, $famille) : array {
    $sth = $this->db->prepare("SELECT * from Produits where rayon = :rayon and famille = :famille");
    $sth->execute(array(":rayon" => $rayon, ":famille" => $famille));
    $result = $sth->fetchAll(PDO::FETCH_ASSOC);
    $produits = array();
    foreach($result as $value) {
      $produit = new Produit($value['stock'],$value['refProduit'],$value['libelle'],$value['fabricant'],$value['rayon'],$value['famille'],
      $value['coef'],$value['description'],$value['origine'],$value['caracteristiques'],$value['prixU'],$value['urlImg'],$value['quantiteU'],$value['unite'],$value['active']);
      array_push($produits, $produit);
    }
    return $produits;
  }


  public function getProduitsComprenant($groupeDeMot) {
    $recherche = "%".$groupeDeMot."%";
    $sth = $this->db->prepare("SELECT * from Produits where libelle LIKE :recherche or rayon LIKE :recherche or famille LIKE :recherche or description LIKE :recherche");
    $sth->execute(array(":recherche" => $recherche));
    $result = $sth->fetchAll(PDO::FETCH_ASSOC);
    $produits = array();
    foreach($result as $value) {
      $produit = new Produit($value['stock'],$value['refProduit'],$value['libelle'],$value['fabricant'],$value['rayon'],$value['famille'],
      $value['coef'],$value['description'],$value['origine'],$value['caracteristiques'],$value['prixU'],$value['urlImg'],$value['quantiteU'],$value['unite'],$value['active']);
      array_push($produits, $produit);
    }
    return $produits;
  }

}

?>
