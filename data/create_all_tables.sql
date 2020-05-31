CREATE TABLE clients (
  refUtilisateur INTEGER PRIMARY KEY,
  nom STRING,
  prenom STRING,
  adresseMail STRING,
  motDePasse STRING,
  etat STRING,
  numeroTelephone STRING,
  newsletter BOOLEAN,
  genre BOOLEAN,
  tauxReduction FLOAT
 );

CREATE TABLE employes (
  refUtilisateur INTEGER PRIMARY KEY,
  nom STRING,
  prenom STRING,
  adresseMail STRING,
  motDePasse STRING,
  etat STRING,
  numeroTelephone STRING,
  statut BOOLEAN
);

CREATE TABLE clientsEntreprise (
  refUtilisateur INTEGER PRIMARY KEY,
  nom STRING,
  prenom STRING,
  adresseMail STRING,
  motDePasse STRING,
  etat STRING,
  numeroTelephone STRING,
  newsletter BOOLEAN,
  genre BOOLEAN,
  tauxReduction FLOAT,
  refEntreprise INTEGER
);

CREATE TABLE entreprises (
  refEntreprise INTEGER PRIMARY KEY,
  nom STRING,
  numeroSiret STRING
);

 CREATE TABLE clientsEntreprise_entreprises (
   refClientE INTEGER NOT NULL,
   refEntreprise INTEGER NOT NULL,
   PRIMARY KEY(refClientE, refEntreprise),
   CONSTRAINT refClientE
     FOREIGN KEY(refClientE)
     REFERENCES clientsEntreprise(refUtilisateur),
   CONSTRAINT refEntreprise
     FOREIGN KEY(refEntreprise)
     REFERENCES entreprises(refEntreprise)
  );

CREATE TABLE produits (
  stock INTEGER,
  refProduit INTEGER PRIMARY KEY,
  libelle STRING,
  fabricant STRING,
  rayon STRING,
  famille STRING,
  coef FLOAT,
  description STRING,
  origine STRING,
  caracteristiques STRING,
  prixU FLOAT,
  urlImg STRING,
  quantiteU FLOAT,
  unite STRING,
  active BIT
);

CREATE TABLE paniers (
   refPanier INTEGER PRIMARY KEY,
   libelle STRING,
   coefficient INTEGER,
   prix FLOAT,
   image STRING,
   nbBocaux INTEGER,
   active BIT
);

CREATE TABLE produits_paniers (
  refProduit INTEGER NOT NULL,
  refPanier INTEGER NOT NULL,
  quantite INTEGER,
  PRIMARY KEY(refProduit, refPanier),
  CONSTRAINT refProduit
    FOREIGN KEY(refProduit)
    REFERENCES produits(refProduit),
  CONSTRAINT refPanier
    FOREIGN KEY(refPanier)
    REFERENCES paniers(refPanier)
);

CREATE TABLE commandes(
  refCommande INTEGER PRIMARY KEY,
  refClient INTEGER NOT NULL,
  dateCommande DATE,
  dateRecup DATE,
  etat STRING,
  livriason BIT,
  prix FLOAT
);

CREATE TABLE paniers_commandes (
  refPanier INTEGER NOT NULL,
  refCommande INTEGER NOT NULL,
  nbPersonne INTEGER NOT NULL,
  quantite INTEGER,
  PRIMARY KEY(refPanier, refCommande),
  CONSTRAINT refCommande
    FOREIGN KEY(refCommande)
    REFERENCES commandes(refCommande),
  CONSTRAINT refPanier
    FOREIGN KEY(refPanier)
    REFERENCES paniers(refPanier)
);

.separator ;

.import produits.csv produits
.import paniers.csv paniers
.import produits_paniers.csv produits_paniers
.import commandes.csv commandes
.import paniers_commandes.csv paniers_commandes
.import employes.csv employes
.import clients.csv clients
.import entreprises.csv entreprises
.import clientsEntreprise.csv clientsEntreprise
.import clientsEntreprise_entreprises.csv clientsEntreprise_entreprises
