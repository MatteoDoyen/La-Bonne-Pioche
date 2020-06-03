<?php
    $commencer = false;
    echo('[');
    foreach ($list as $prod)
    {
      if($commencer==true)
      {
        echo(',');
      }
      $produit = new stdClass();
      $produit->url=$prod->urlImg;
      $produit->name=$prod->libelle;
      $produit->quantite=$prod->quantiteU;
      $produit->unite=$prod->unite;
      $produit->fabricant=$prod->fabricant;
      $produit->refProduit=$prod->refProduit;

      //$myObj->name=$prod->libelle;
      $myJSON = json_encode($produit);

      echo $myJSON;
      $commencer = true;
    }
      echo(']');
?>
