<?php
require_once(dirname(__FILE__).'/Commande.class.php');
require_once(dirname(__FILE__).'/Panier.class.php');
require_once(dirname(__FILE__).'/PanierDAO.class.php');
require_once(dirname(__FILE__).'/Client.class.php');
require_once(dirname(__FILE__).'/ClientEntreprise.class.php');
require_once(dirname(__FILE__).'/Entreprise.class.php');
require_once(dirname(__FILE__).'/ClientDAO.class.php');
require_once(dirname(__FILE__).'/ClientEntrepriseDAO.class.php');
require_once(dirname(__FILE__).'/EntrepriseDAO.class.php');

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
      $commande = new Commande($row['refCommande'],$row['refClient'],$row['dateCommande'],$row['dateRecup'],$row['etat'],$row['livraison'],$row['prix']);
    }
    return $commande;
  }

  // Renvoie toutes les commandes
  function getAll() : Array {
    $req = "SELECT * FROM commandes ORDER BY refCommande DESC";
    $sth = $this->db->query($req);
    $resArray= $sth->fetchAll(PDO::FETCH_ASSOC);
    $commandes = array();
    foreach($resArray as $row)
    {
      $commandes[] = new Commande($row['refCommande'],$row['refClient'],$row['dateCommande'],$row['dateRecup'],$row['etat'],$row['livraison'],$row['prix']);
    }
    return $commandes;
  }

  // Renvoie les commandes dont l'état est en cours
  function getCmdEnCours() : Array {
    $req = "SELECT * FROM commandes WHERE etat = 'en cours' ORDER BY refCommande DESC";
    $sth = $this->db->query($req);
    $resArray= $sth->fetchAll(PDO::FETCH_ASSOC);

    $cmdencours = array();
    foreach($resArray as $row)
    {
      $cmdencours[] = new Commande($row['refCommande'],$row['refClient'],$row['dateCommande'],$row['dateRecup'],$row['etat'],$row['livraison'],$row['prix']);
    }
    return $cmdencours;
  }

  // Renvoie les commandes dont l'état est à relancer
  function getCmdARelancer(): Array{
    $req = "SELECT * FROM commandes WHERE etat = 'à relancer' ORDER BY refCommande DESC";
    $sth = $this->db->query($req);
    $resArray= $sth->fetchAll(PDO::FETCH_ASSOC);

    $cmdrelance = array();
    foreach($resArray as $row)
    {
      $cmdrelance[] = new Commande($row['refCommande'],$row['refClient'],$row['dateCommande'],$row['dateRecup'],$row['etat'],$row['livraison'],$row['prix']);
    }
    return $cmdrelance;
  }

  // Renvoie les commandes dont l'état est récupérée
  function getCmdRecuperee():Array{
    $req = "SELECT * FROM commandes WHERE etat = 'récupérée' ORDER BY refCommande DESC";
    $sth = $this->db->query($req);
    $resArray= $sth->fetchAll(PDO::FETCH_ASSOC);

    $cmdrelance = array();
    foreach($resArray as $row)
    {
      $cmdrelance[] = new Commande($row['refCommande'],$row['refClient'],$row['dateCommande'],$row['dateRecup'],$row['etat'],$row['livraison'],$row['prix']);
    }
    return $cmdrelance;
  }

  // Renvoie la refCommande la plus élevée
  function getMaxRefCommande() : int{
    try {
      $r = $this->db->query("SELECT MAX(refCommande) FROM commandes");
      $res = $r->fetchAll();
    } catch (PDOException $e) {
      die("PDO Error :".$e->getMessage());
    }
    return ($res[0][0]);
  }

  // Renvoie la composition d'un panier = un array de paniers
  function getComposition(int $refCommande) : array{
    $paniers = new PanierDAO();
    $r = $this->db->query("SELECT * FROM paniers_commandes WHERE refCommande = '$refCommande'");
    $res = $r->fetchAll(PDO::FETCH_ASSOC);
    $composition = array();
    foreach($res as $row)
    {
      $nbPersonne = $row['nbPersonne'];
      $panier = $paniers->get($row['refPanier']);
      $panier->nbPersonne = $nbPersonne;
      $composition[$row['quantite']]=$panier;
    }
    return $composition;
  }

  // créer une commande dans la table commandes
  public function insertCommade($refClient, $dateCommande, $dateRecup, $etat, $livriason, $prix) {
    $refCommande = $this->getMaxRefCommande()+1;
    $sql = "INSERT INTO commandes VALUES($refCommande, $refClient, '$dateCommande', '$dateRecup', '$etat', $livriason, $prix)";
    $this->db->query($sql);
  }

  // créer un nuplet dans la table association paniers_commandes
  public function insertPanierCommande($refPanier, $refCommande, $quantite) {
      $sql = "INSERT INTO paniers_commandes VALUES($refPanier, $refCommande, $quantite)";
      $this->db->query($sql);
  }

  // supprime une commande
  public function deleteCommande($refCommande) {
          $sql = "DELETE FROM paniers_commandes WHERE refCommande = '$refCommande'";
          $this->db->query($sql);
          $sql = "DELETE FROM commandes WHERE refCommande = '$refCommande'";
          $this->db->query($sql);
  }

  // modifier l'état de la commande à récupérée (accuse la réception d'une commande)
  public function validerCommande($refCommande) {
      $sql = "UPDATE commandes SET etat = 'récupérée' WHERE refCommande = '$refCommande'";
      $this->db->query($sql);
  }

  // modifiation automatique de l'état de la commande (passage de 'en cours' à 'à relancer' en fonction de la date du jour / date de récupération de la commande)
  public function updateCommande($arrayCommande){
    date_default_timezone_set('Europe/Paris');
    foreach ($arrayCommande as $commande) {
      $date = date('Y-m-d H:i:s');
      $date = strtotime($date);
      $dateR = $commande->dateRecup;
      $dateR = strtotime($dateR);
      if( (($date-$dateR)>0) && ($commande->etat == "en cours")) {
        $sql = "UPDATE commandes SET etat = 'à relancer' WHERE refCommande = '$commande->refCommande'";
        $this->db->query($sql);
      }
    }
  }


  public function getClient($refCommande){
    $commande = $this->get($refCommande);
    $id = $commande->refClient;

    if($commande->livraison)
    {
      $clients = new ClientEntrepriseDAO();
      $client = $clients->get($id);
      return $client;
    }
    else
    {
      $clients =  new ClientDAO();
      $client = $clients->get($id);
      return $client;
    }
  }

  public function getAdresseRecup($refCommande){
    $commande = $this->get($refCommande);
    $id = $commande->refClient;

    if($commande->livraison)
    {
      $clients = new ClientEntrepriseDAO();
      $client = $clients->get($id);
      $refEntreprise = $client->refEntreprise;

      $entreprises = new EntrepriseDAO();
      $entreprise = $entreprises->get($refEntreprise);
      $adresse = $entreprise->nom.", ".$entreprise->adresse;
      return $adresse;
    }
    else
    {
      $adresse = "En magasin, 2 rue Condillac 38000 Grenoble";
      return $adresse;
    }
  }

  public function getProduitsCommande($refCommande){
    $paniers = new PanierDAO();
    $descriptif = $this->getComposition($refCommande); //renvoie les paniers de la commande
    $compos = array();
    foreach ($descriptif as $panier) {
      $compo = $paniers->getComposition($panier->refPanier);
      $compos['refPanier'] = $compo;
    }
    return $compos;
  }

}
?>
