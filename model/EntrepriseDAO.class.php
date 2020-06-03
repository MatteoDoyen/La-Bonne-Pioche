<?php
  require_once(dirname(__FILE__).'/Entreprise.class.php');
  require_once(dirname(__FILE__).'/ClientEntreprise.class.php');
  require_once(dirname(__FILE__).'/ClientEntrepriseDAO.class.php');

  class EntrepriseDAO {
    private $db;

    function __construct()
    {
      $database = 'sqlite:'.dirname(__FILE__).'/../data/database.db';

      try {
        $this->db = new PDO($database);
        if(!$this->db){
          die ("Database error");
        }
      }
      catch (PDOException $e)
      {
        die("PDO Error :".$e->getmessage()." $database\n");
      }
      $this->db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    }

    function get(int $refEntreprise) : Entreprise {
      $req = "SELECT * FROM entreprises WHERE refEntreprise = '$refEntreprise'";
      $sth = $this->db->query($req);
      $resArray= $sth->fetchAll(PDO::FETCH_ASSOC);
      $entreprise = new Entreprise($resArray[0]['refEntreprise'],$resArray[0]['nom'],$resArray[0]['numeroSiret'],$resArray[0]['adresse']);
      return $entreprise;
    }


    // Renvoie un arrayList composé des salariés d'une entreprise
    function getPersonnels(int $refEntreprise) : array {
      $utilisateur = new ClientEntrepriseDAO();
      $r = $this->db->query("SELECT * FROM clientsEntreprise_entreprises WHERE refEntreprise = $refEntreprise");
      $res = $r->fetchAll(PDO::FETCH_ASSOC);
      $personnels = array();

      foreach($res as $row)
      {
        $prod = $utilisateur->get($row['refUtilisateur']);
        $personnels[]=$prod;
      }
      return $personnels;
    }

    // Renvoie toutes les entreprises de la table entreprises
    function getAllEntreprises() : array {
      $r = $this->db->prepare("SELECT distinct nom from Entreprises");
      $r->execute();
      $noms = $r->fetchAll(PDO::FETCH_ASSOC);
      return $noms;
    }

    
    function addClientEntreprise($nom, $prenom, $adresseMail, $motDePasse, $numeroTelephone, $newsletter, $genre, $nom_entreprise) {
      $sth = $this->db->prepare("SELECT max(refUtilisateur) FROM clientsEntreprise");
      $sth->execute();
      $max = $sth->fetch()[0] + 1;
      $sth2 = $this->db->prepare("SELECT refEntreprise FROM Entreprises where nom=:nom_entreprise");
      $sth2->execute(array(":nom_entreprise" => $nom_entreprise));
      $refEntreprise = $sth2->fetch()[0];

      $sth3 = $this->db->prepare("INSERT INTO clientsEntreprise(refUtilisateur, nom, prenom, adresseMail, motDepasse, etat, numeroTelephone, newsletter, genre, tauxReduction, refEntreprise) VALUES(:ref, :nom, :prenom, :adresseMail, :motDePasse, :etat, :numeroTelephone, :newsletter, :genre, :tauxReduction, :refEntreprise)");
      $result = $sth3->execute(array(":ref" => $max, ":nom" => $nom, ":prenom" => $prenom, ":adresseMail" => $adresseMail, ":motDePasse" => $motDePasse, ":etat" => "Non défini", ":numeroTelephone" => $numeroTelephone, ":newsletter" => $newsletter, ":genre" => $genre, ":tauxReduction" => 0.0, ":refEntreprise" => $refEntreprise));
    }


    function getUtilisateurOfThisEmail(string $mail) {
      $sth = $this->db->prepare("SELECT refUtilisateur, nom, prenom, adresseMail, motDePasse, etat, numeroTelephone, newsletter, genre, tauxReduction, refEntreprise FROM clientsEntreprise WHERE adresseMail = :mail");
      $sth->execute(array(":mail" => $mail));
      $result = $sth->fetchAll(PDO::FETCH_ASSOC);

      if($result){
        $result = $result[0];
        $uti = new clientEntreprise($result['refUtilisateur'],$result['nom'],$result['prenom'],$result['adresseMail'], $result['motDePasse'], $result['etat'], $result['numeroTelephone'], $result['newsletter'], $result['genre'], $result['tauxReduction'], $result['refEntreprise']);
        return $uti;
      }else{
        return false;
      }
    }


  }

 ?>
