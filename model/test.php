<?php

require_once(dirname(__FILE__).'/Panier.class.php');
require_once(dirname(__FILE__).'/Produit.class.php');
require_once(dirname(__FILE__).'/ProduitDAO.class.php');
require_once(dirname(__FILE__).'/PanierDAO.class.php');

$panier = new PanierDAO();

$test = $panier->get(2);
print_r($test);
 ?>
