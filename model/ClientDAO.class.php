<?php
require_once(dirname(__FILE__).'/Client.class.php');
require_once("../model/Utilisateur.class.php");

// Le Data Access Objet
class ClientDAO {
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
  }

  // Accès aux clients
  function get(int $id) : Client {
    $req = "SELECT * FROM clients WHERE refUtilisateur = $id";
    $sth = $this->db->query($req);
    $resArray= $sth->fetchAll(PDO::FETCH_ASSOC);
    foreach($resArray as $row)
    {
      $client = new Client($row['refUtilisateur'],$row['nom'],$row['prenom'],$row['adresseMail'],$row['motDePasse'],
      $row['etat'],$row['numeroTelephone'],$row['newsletter'],$row['genre'],$row['tauxReduction']);
    }
    return $client;
  }

  function getNbElements() : int{
    try {
      $r = $this->db->query("SELECT COUNT(*) FROM clients");
      $res = $r->fetchAll();
    } catch (PDOException $e) {
      die("PDO Error :".$e->getMessage());
    }
    return ($res[0][0]);
  }


  // Retourne un utilisateur ou null si l'adresse mail ne coresspond a aucun utilisateur
  function getUtilisateursEmail(string $mail) : bool {
    $sth = $this->db->prepare("SELECT * FROM Clients c, Employes e, ClientsEntreprise ce WHERE c.adresseMail = :mail or e.adresseMail = :mail or ce.adresseMail = :mail");
    $sth->execute(array(":mail" => $mail));
    $result = $sth->fetch(PDO::FETCH_ASSOC);

    if($result){
      return true;
    }else{
      return false;
    }
  }

  //renvoie l'utilisateur auquel correspond l'email passé en paramètre
  function getUtilisateurOfThisEmail(string $mail) {
    $sth = $this->db->prepare("SELECT refUtilisateur, nom, prenom, adresseMail, motDePasse, etat, numeroTelephone FROM Clients WHERE adresseMail = :mail");
    $sth->execute(array(":mail" => $mail));
    $result = $sth->fetchAll(PDO::FETCH_ASSOC);

    if($result){
      $result = $result[0];
      $uti = new Utilisateur($result['refUtilisateur'],$result['nom'],$result['prenom'],$result['adresseMail'], $result['motDePasse'], $result['etat'], $result['numeroTelephone']);
      return $uti;
    }else{
      return false;
    }
  }

  // Crée un client dans la base de données
  function addClient($nom, $prenom, $adresseMail, $motDePasse, $numeroTelephone, $newsletter, $genre) {
    $sth = $this->db->prepare("SELECT max(refUtilisateur) FROM Clients");
    $sth->execute();
    $max = $sth->fetch()[0] + 1;

    $sth2 = $this->db->prepare("INSERT INTO Clients(refUtilisateur, nom, prenom, adresseMail, motDepasse, etat, numeroTelephone, newsletter, genre, tauxReduction) VALUES(:ref, :nom, :prenom, :adresseMail, :motDePasse, :etat, :numeroTelephone, :newsletter, :genre, :tauxReduction)");
    $result = $sth2->execute(array(":ref" => $max, ":nom" => $nom, ":prenom" => $prenom, ":adresseMail" => $adresseMail, ":motDePasse" => $motDePasse, ":etat" => "Non défini", ":numeroTelephone" => $numeroTelephone, ":newsletter" => $newsletter, ":genre" => $genre, ":tauxReduction" => 0.0));
  }

}

?>
