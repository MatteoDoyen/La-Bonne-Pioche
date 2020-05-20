CREATE TABLE produits_paniers (
  id_produit INTEGER NOT NULL,
  id_panier INTEGER NOT NULL,
  quantite INTEGER,
  PRIMARY KEY(id_produit, id_panier),
  CONSTRAINT id_produit
    FOREIGN KEY(id_produit)
    REFERENCES produits(id),
  CONSTRAINT id_panier
    FOREIGN KEY(id_panier)
    REFERENCES paniers(id_Panier)
 );
