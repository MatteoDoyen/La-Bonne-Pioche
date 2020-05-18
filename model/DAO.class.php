<?php
// Le Data Access Object
// Il représente la base de donnée
class DAO {
    /**
     * L'objet local PDO de la base de donnée
     *
     * @var PDO
     */
    public $db;
    /**
     * Le type, le chemin et le nom de la base de donnée
     *
     * @var string
     */
    private $database = 'sqlite:../data/data.db'; // A CHANGER POUR UTILISER PARSE_INI_FILE
    /**
     * @var DAO représente une instance de la classe DAO afin d'implémenter le pattern Singleton
     */
    private static $instance;
     /**
     * Constructeur chargé d'ouvrir la BD
     * @throws Exception
     */
    function __construct() {
        try {
            $this->db = new PDO($this->database);
        } catch (\Exception $e) {
            echo "Erreur dans le constructeur du PDO \n" . $e->getMessage();
        }
    }

    public static function getInstance() {
        if (!isset(self::$instance)) {
            $object = __CLASS__;
            self::$instance = new $object;
        }
        return self::$instance;
    }

    ////////////////////////////////////////////////////////////////////////////////////////
    ///////////////////////                METHODES              ///////////////////////////
    ////////////////////////////////////////////////////////////////////////////////////////

    /**
     * Retourne tous les groupes de produit
     * @return array Array composé de la liste des groupes de produit
     */
    function getTypes() {
      // Requette pour récuperer tous les groupes de produits
      $sth = $this->db->prepare("SELECT distinct groupe From Type");
      $sth->execute();
      $groupes = $sth->fetchAll(PDO::FETCH_ASSOC);
      foreach ($groupes as $key => $value) {
        // Requette pour récupérer tous les types de produit et le nombre de produit pour chaque type du groupe $value
        $sth = $this->db->prepare("SELECT distinct type, count(id) as nb FROM Produits, Type WHERE groupe = :groupe and nom = type GROUP BY type");
        $sth->execute(array(':groupe' => $value['groupe']));
        $types = $sth->fetchAll(PDO::FETCH_ASSOC);
        array_push($groupes[$key], $types);
        // Requette pour avoir le total de produit pour chaque groupe
        $sth = $this->db->prepare("SELECT count(*) as total FROM Type t, Produits p WHERE groupe = :groupe and nom = type");
        $sth->execute(array(':groupe' => $value['groupe']));
        $total = $sth->fetchAll(PDO::FETCH_COLUMN);
        array_push($groupes[$key], $total);
      }
      return $groupes;
    }
}


?>
