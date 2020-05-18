CREATE TABLE produits_paniers (
  id_produit INTEGER NOT NULL REFERENCES produits(id),
  id_panier INTEGER NOT NULL REFERENCES paniers(id_Panier),
  PRIMARY KEY(id_produit, id_panier)
 );
