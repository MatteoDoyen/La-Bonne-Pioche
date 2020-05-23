





class article{
  constructor(id, libelle, nbPersonnes, quantite, prix){
    this.id = id;
    this.libelle = libelle;
    this.nbPersonnes = nbPersonnes;
    this.quantite = quantite;
    this.prix = prix;
  }
}



var panierAchat = [];

function ajoutArticle(elm){
  let quant = document.getElementById("Q_"+elm.id).value;
  let price = document.getElementById("P_"+elm.id).innerHTML;
  let nombre = document.getElementsByClassName("nbPersSelectedadd"+elm.id).length;
  var panier = new article(elm.id, elm.name, nombre, quant, price);
  panierAchat.push(panier);
  console.log(panierAchat);
  setCookie(elm.id , panier, 1);
}
