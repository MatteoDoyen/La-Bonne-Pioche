<?php
require_once(dirname(__FILE__).'/Employe.class.php');

// Le Data Access Objet
class EmployeDAO {
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
  function get(int $refUtilisateur) : Employe {
    $req = "SELECT * FROM employes WHERE refUtilisateur = '$refUtilisateur'";
    $sth = $this->db->query($req);
    $resArray= $sth->fetchAll(PDO::FETCH_ASSOC);
    foreach($resArray as $row)
    {
      $employe = new Employe($row['refUtilisateur'],$row['nom'],$row['prenom'],$row['adresseMail'],$row['motDePasse'],
      $row['etat'],$row['numeroTelephone'],0);
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

  // Créer un employer dans la table employes
  function addEmploye($nom, $prenom, $adresseMail, $motDePasse, $numeroTelephone) {
    $sth = $this->db->prepare("SELECT max(refUtilisateur) FROM Employes");
    $sth->execute();
    $max = $sth->fetch()[0] + 1;

    $sth2 = $this->db->prepare("INSERT INTO Employes(refUtilisateur, nom, prenom, adresseMail, motDepasse, etat, numeroTelephone, statut) VALUES(:ref, :nom, :prenom, :adresseMail, :motDePasse, :etat, :numeroTelephone, :statut)");
    $result = $sth2->execute(array(":ref" => $max, ":nom" => $nom, ":prenom" => $prenom, ":adresseMail" => $adresseMail, ":motDePasse" => $motDePasse, ":etat" => "Non défini", ":numeroTelephone" => $numeroTelephone, ":statut" => 0));
  }

  // renvoie l'utilisateur associé à un email
  function getUtilisateurOfThisEmail(string $mail): Employe {
    $sth = $this->db->prepare("SELECT * FROM employes WHERE adresseMail = :mail");
    $sth->execute(array(":mail" => $mail));

    $result = $sth->fetchAll(PDO::FETCH_ASSOC);
    if($result){
      $result = $result[0];

      $uti = new Employe($result['refUtilisateur'],$result['nom'],$result['prenom'],$result['adresseMail'], $result['motDePasse'], $result['etat'], $result['numeroTelephone'], intval($result['statut']));

      return $uti;
    }else{
      return false;
    }
  }

}

?>
