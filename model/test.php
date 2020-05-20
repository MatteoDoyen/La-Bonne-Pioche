<?php

require_once(dirname(__FILE__).'/Entreprise.class.php');
require_once(dirname(__FILE__).'/EntrepriseDAO.class.php');

require_once(dirname(__FILE__).'/ClientEntreprise.class.php');

$panier = new EntrepriseDAO();

$test = $panier->getPersonnels(2);
print_r($test);
 ?>
