<?php
require_once(dirname(__FILE__).'/Utilisateur.class.php');

// Le Data Access Objet
class UtilisateurDAO {
  private $db;

  // Constructeur chargé d'ouvrir la BD
  function __construct() {
    $database = 'sqlite:'.dirname(__FILE__).'/../data/utilisateurs.db';
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

  // Accès aux utilisateurs
  function get(int $id) : Utilisateur {
    $req = "SELECT * FROM utilisateurs WHERE id = '$id'";
    $sth = $this->db->query($req);
    $resArray= $sth->fetchAll(PDO::FETCH_ASSOC);
    foreach($resArray as $row)
    {
      $utilisateur = new ClientEntreprise($row['refUtilisateur'],$row['nom'],$row['prenom'],$row['adresseMail'],$row['motDePasse'],
      $row['newsletter'],$row['genre'],$row['numeroTelephone'],$row['$tauxReduction'],$row['refEntreprise']);
    }
    return $utilisateur;
  }

  function getNbElements() : int{
    try {
      $r = $this->db->query("SELECT COUNT(*) FROM utilisateurs");
      $res = $r->fetchAll();
    } catch (PDOException $e) {
      die("PDO Error :".$e->getMessage());
    }
    return ($res[0][0]);
  }
}

?>
