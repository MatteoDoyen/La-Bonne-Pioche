<?php
// Display tous les produits
// Inclusion du modèle
require_once('../model/CommandeDAO.class.php');
require_once('../framework/view.class.php'); // AJOUTE POUR MVC


// public function insertCommande($refClient, $dateCommande, $dateRecup, $etat, $livraison, $prix) {
//   $refCommande = $this->getMaxRefCommande()+1;
//   $sql = "INSERT INTO commandes VALUES($refCommande, $refClient, '$dateCommande', '$dateRecup', '$etat', $livraison, $prix)";
//   $this->db->query($sql);
// }
//
//
// public function insertPanierCommande($refPanier, $refCommande, $quantite) {
//     $sql = "INSERT INTO paniers_commandes VALUES($refPanier, $refCommande, $quantite)";
//     $this->db->query($sql);
// }


// Creation de l'instance DAO
$catalogue = new PanierDAO();

$commande = new CommandeDAO();

// On parcours le tableau passé en paramètre
if(isset($_POST['paniers'])){
  //on donne un numéro de commande en incrémentant par rapport au numéro maximum
  $paniers = $_POST['paniers'];
  $i = $commande->getMaxRefCommande()+1;
  $somme = 0;
  foreach ($paniers as $value) {
    $articles = explode('_',$value);
    $commande->insertPanierCommande($articles[0], $i, $articles[2]);
    $somme += $catalogue->get($articles[0])->prix * intval($articles[2]);

  }
}

// On affecte la commande de paniers
$commande->insertCommande($i, date("Y-m-d H:i:s") ,date("Y-m-d H:i:s")  ,'en cours', 'Meylan', $somme);


// On créer une variable view que l'on rattache au fichier accueil.view.php
$view = new View("finaliserCommande.view.php");

// Envoie la liste des produits à la vue
$view->list=$list;

// Appel de la vue
$view->show();
?>
