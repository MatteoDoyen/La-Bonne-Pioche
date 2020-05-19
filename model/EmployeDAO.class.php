<?php
require_once(dirname(__FILE__).'/Employe.class.php');

// Le Data Access Objet
class EmployeDAO {
  private $db;

  // Constructeur chargé d'ouvrir la BD
  function __construct() {
    $database = 'sqlite:'.dirname(__FILE__).'/../data/employes.db';
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

  // Accès aux clients
  function get(int $id) : Employe {
    $req = "SELECT * FROM clients WHERE id = '$id'";
    $sth = $this->db->query($req);
    $resArray= $sth->fetchAll(PDO::FETCH_ASSOC);
    foreach($resArray as $row)
    {
      $employe = new Employe($row['refUtilisateur'],$row['nom'],$row['prenom'],$row['adresseMail'],$row['motDePasse'],
      $row['etat'],$row['numeroTelephone'],$row['statut']);
    }
    return $employe;
  }

  function getNbElements() : int{
    try {
      $r = $this->db->query("SELECT COUNT(*) FROM employes");
      $res = $r->fetchAll();
    } catch (PDOException $e) {
      die("PDO Error :".$e->getMessage());
    }
    return ($res[0][0]);
  }
}

?>