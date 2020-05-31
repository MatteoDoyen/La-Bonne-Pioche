<?php
require_once(dirname(__FILE__).'/Commande.class.php');
require_once(dirname(__FILE__).'/Panier.class.php');
require_once(dirname(__FILE__).'/PanierDAO.class.php');
require_once(dirname(__FILE__).'/ClientDAO.class.php');
require_once(dirname(__FILE__).'/ClientEntrepriseDAO.class.php');

// Le Data Access Objet
class CommandeDAO {
  private $db;

  // Constructeur chargé d'ouvrir la BD
  function __construct() {

    //db
    $database_commande = 'sqlite:'.dirname(__FILE__).'/../data/database.db';
    try {
      $this->db = new PDO($database_commande);
      if (!$this->db) {
        die ("Database error");
      }
    } catch (PDOException $e) {
      die("PDO Error :".$e->getMessage()." $database_commande\n");
    }
    $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  }

  // Accès à une commande
  function get(int $refCommande) : Commande {
    $req = "SELECT * FROM commandes WHERE refCommande = '$refCommande'";
    $sth = $this->db->query($req);
    $resArray= $sth->fetchAll(PDO::FETCH_ASSOC);
    foreach($resArray as $row)
    {
      $commande = new Commande($row['refCommande'],$row['refClient'],$row['dateCommande'],$row['dateRecup'],$row['etat'],$row['livriason'],$row['prix']);
    }
    return $commande;
  }

  function getAll(int $refCommande) : Array {
    $req = "SELECT * FROM commandes";
    $sth = $this->db->query($req);
    $resArray= $sth->fetchAll(PDO::FETCH_ASSOC);
    foreach($resArray as $row)
    {
      $commande = new Commande($row['refCommande'],$row['refClient'],$row['dateCommande'],$row['dateRecup'],$row['etat'],$row['livriason'],$row['prix']);
    }
    return $commande;
  }

  function getCmdEnCours() : Array {
    $req = "SELECT * FROM paniers WHERE etat = 'en_cours'";
    $sth = $this->db->query($req);
    $resArray= $sth->fetchAll(PDO::FETCH_ASSOC);

    $cmdencours = array();
    foreach($resArray as $row)
    {
      $cmdencours[] = new Commande($row['refCommande'],$row['refClient'],$row['dateCommande'],$row['dateRecup'],$row['etat'],$row['livriason'],$row['prix']);
    }
    return $cmdencours;
  }

  function getCmdARelancer(): Array{
    $req = "SELECT * FROM paniers WHERE etat = 'a_relancer'";
    $sth = $this->db->query($req);
    $resArray= $sth->fetchAll(PDO::FETCH_ASSOC);

    $cmdrelance = array();
    foreach($resArray as $row)
    {
      $cmdrelance[] = new Commande($row['refCommande'],$row['refClient'],$row['dateCommande'],$row['dateRecup'],$row['etat'],$row['livriason'],$row['prix']);
    }
    return $cmdrelance;
  }

  function getCmdRecuperee():Array{
    $req = "SELECT * FROM paniers WHERE etat = 'recuperee'";
    $sth = $this->db->query($req);
    $resArray= $sth->fetchAll(PDO::FETCH_ASSOC);

    $cmdrelance = array();
    foreach($resArray as $row)
    {
      $cmdrelance[] = new Commande($row['refCommande'],$row['refClient'],$row['dateCommande'],$row['dateRecup'],$row['etat'],$row['livriason'],$row['prix']);
    }
    return $cmdrelance;
  }

  function getMaxRefCommande() : int{
    try {
      $r = $this->db->query("SELECT MAX(refCommande) FROM commandes");
      $res = $r->fetchAll();
    } catch (PDOException $e) {
      die("PDO Error :".$e->getMessage());
    }
    return ($res[0][0]);
  }

  function getComposition(int $refCommande) : array{
    $paniers = new PanierDAO();
    $r = $this->db->query("SELECT * FROM paniers_commandes WHERE refCommande = '$refCommande'");
    $res = $r->fetchAll(PDO::FETCH_ASSOC);
    $compositionC = array();
    foreach($res as $row)
    {
      $clee = $row['refPanier'].' '.$row['nbPersonne'];
      $panier = $paniers->get($row['refPanier']);
      $compositionC[$clee]=$panier;
    }
    return $compositionC;
  }


  public function insertCommade($refClient, $dateCommande, $dateRecup, $etat, $livriason, $prix) {
    $refCommande = $this->getMaxRefCommande()+1;
    $sql = "INSERT INTO commandes VALUES($refCommande, $refClient, '$dateCommande', '$dateRecup', '$etat', $livriason, $prix)";
    $this->db->query($sql);
  }


  public function insertPanierCommande($refPanier, $refCommande, $quantite) {
      $sql = "INSERT INTO paniers_commandes VALUES($refPanier, $refCommande, $quantite)";
      $this->db->query($sql);
  }


  public function deleteCommande($refCommande) {
          $sql = "DELETE FROM paniers_commandes WHERE refCommande = '$refCommande'";
          $this->db->query($sql);
          $sql = "DELETE FROM commandes WHERE refCommande = '$refCommande'";
          $this->db->query($sql);
  }


  public function modifierEtatCommande($refCommande, $state) {
      $sql = "UPDATE commandes SET etat = $state WHERE refCommande = '$refCommande'";
      return $this->db->query($sql);
  }


  public function getClient($refCommande){
    $commande = get($refCommande);
    if($commande->livraison)
    {
      $clientsE = new ClientEntrepriseDAO();
      $client = $clientsE->get($commande->refClient);
      return $client;
    }
    else {
      $clients = new ClientDAO();
      $client = $clients->get($commande->refClient);
      return $client;
    }
  }




}

?>
