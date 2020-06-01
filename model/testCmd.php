<?php
require_once(dirname(__FILE__).'/CommandeDAO.class.php');

$commandes = new CommandeDAO();

$client = $commandes->getClient(7);


?>
