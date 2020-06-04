


//////////////////////////////////////////////////////////////////
//  fichier qui gère le stockage dans le localStorage pour
//  transmettre les informations à la page panierAchat.view.php
//////////////////////////////////////////////////////////////////

// Creation de la classe article que l'on stock dans un tableau
// panierAchat dans le storage
class article{
  constructor(id, libelle, nbPersonnes, quantite, prix, coeff, img, nbBocaux, prixInit){
    this.id = id;
    this.libelle = libelle;
    this.nbPersonnes = nbPersonnes;
    this.quantite = quantite;
    this.prix = prix;
    this.coeff = coeff;
    this.img = img;
    this.nbBocaux = nbBocaux;
    this.prixInit = prixInit;
  }

  afficheInfo(){
    console.log("id: "+this.id+", libelle:"+this.libelle);
  }
}


// tableau dans lequel sont stockés les articles
var panierAchat = [];

// Si il existe déjà un élèment dans le storage, on le récupère
// et on initialise le tableau au chargement de la page
if(localStorage.getItem("panierAchat") != null){
  panierAchat = JSON.parse(localStorage.getItem("panierAchat"));
}

// Fonction qui ajoute un article au panier d'achat et au storage
function ajoutArticle(elm){
  // initialisation des variables du nouvel article à ajouter
  let quant = document.getElementById("Q_"+elm.id).value;
  let price = document.getElementById("P_"+elm.id).innerHTML;
  let nombre = document.getElementsByClassName("nbPersSelectedadd"+elm.id).length;
  let prix = tabprixinit[elm.id];
  let coeff = document.getElementById("C_"+elm.id).value;
  let img = document.getElementById("imgPanier"+elm.id).src;
  let nbBocaux = document.getElementById("nbBocaux"+elm.id).value;
  var panier = new article(elm.id, elm.name, nombre, quant, price, coeff, img, nbBocaux , prix);
  // On parcours les paniers déjà existant pour voir si il existe un panier correspondant
  // (les paniers sont différenciés par leur id et le nombre de personnes pour lequel ils sont fait)
  // Si le panier existe déjà, on se contente de mettre à jour la quantité
  // sinon on rajoute l'instance d'article au panier d'achat
  let verif = false;
  for(panierIn of panierAchat){
    if(panierIn.id == panier.id){
      if(panierIn.nbPersonnes == panier.nbPersonnes){
        let x = parseInt(panierIn.quantite);
        x += parseInt(panier.quantite);
        panierIn.quantite = x;
        verif = true;
      }
    }
  }
  if(!verif){
    panierAchat.push(panier);
  }


  loadStorage();

}


// Met à jour le localStorage
function loadStorage(){
  localStorage.removeItem("panierAchat");
  localStorage.setItem("panierAchat", JSON.stringify(panierAchat) );
}
