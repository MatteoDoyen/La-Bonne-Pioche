CREATE TABLE clientsEntreprise_entreprises (
  id_clientE INTEGER NOT NULL,
  id_entreprise INTEGER NOT NULL,
  PRIMARY KEY(id_clientE, id_entreprise),
  CONSTRAINT id_clientE
    FOREIGN KEY(id_clientE)
    REFERENCES clientsEntreprise(refUtilisateur),
  CONSTRAINT id_entreprise
    FOREIGN KEY(id_entreprise)
    REFERENCES entreprises(refEntreprise)
 );
