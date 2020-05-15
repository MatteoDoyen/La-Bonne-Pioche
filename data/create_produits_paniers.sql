CREATE TABLE produits_paniers (
  id_produit INTEGER NOT NULL,
  id_panier INTEGER NOT NULL,
  PRIMARY KEY(id_produit, id_panier)
 );
