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
