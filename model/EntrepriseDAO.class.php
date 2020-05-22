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
      $entreprise = new Entreprise($resArray[0]['refEntreprise'],$resArray[0]['nom'],$resArray[0]['numeroSiret']);
      return $entreprise;
    }


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

  }

 ?>
