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

    function get(int $ref_Entreprise) : Entreprise {
      $req = "SELECT * FROM entreprises WHERE ref_entreprise = '$ref_Entreprise'";
      $sth = $this->db->query($req);
      $resArray= $sth->fetchAll(PDO::FETCH_ASSOC);
      print_r($resArray);
      $entreprise = new Entreprise($resArray[0]['ref_entreprise'],$resArray[0]['nom'],$resArray[0]['numero_siret']);
      return $entreprise;
    }


    function getPersonnels(int $ref_Entreprise) : array {
      $utilisateur = new ClientEntrepriseDAO();
      $r = $this->db->query("SELECT * FROM clientsEntreprise_entreprises WHERE id_entreprise = $ref_Entreprise");
      $res = $r->fetchAll(PDO::FETCH_ASSOC);
      $personnels = array();

      foreach($res as $row)
      {
        $prod = $utilisateur->get($row['id_clientE']);
        $personnels[]=$prod;
      }
      return $personnels;
    }

  }

 ?>
