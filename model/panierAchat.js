


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



var panierAchat = [];
if(localStorage.getItem("panierAchat") != null){
  panierAchat = JSON.parse(localStorage.getItem("panierAchat"));
}

function ajoutArticle(elm){
  console.log(panierAchat);
  let quant = document.getElementById("Q_"+elm.id).value;
  let price = document.getElementById("P_"+elm.id).innerHTML;
  let nombre = document.getElementsByClassName("nbPersSelectedadd"+elm.id).length;
  console.log("plop"+nombre);
  let prix = tabprixinit[elm.id];
  let coeff = document.getElementById("C_"+elm.id).value;
  let img = document.getElementById("imgPanier"+elm.id).src;
  let nbBocaux = document.getElementById("nbBocaux"+elm.id).value;
  var panier = new article(elm.id, elm.name, nombre, quant, price, coeff, img, nbBocaux , prix);

  let verif = false;
  console.log(panier.id);
  console.log(panierAchat[panier.id]);
  if(panierAchat[panier.id]){
    for(panierIn of panierAchat){
      if(panier.id == panierIn.id){
        if(panier.nombre == panierIn.nombre){
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
  }
  else{
    panierAchat.push(panier);
  }

  loadStorage();
  console.log(panierAchat);
}


function loadStorage(){
  localStorage.removeItem("panierAchat");
  localStorage.setItem("panierAchat", JSON.stringify(panierAchat));
}


function ajax_get_request(callback, url, async) {
  var xhr = new XMLHttpRequest(); // Création de l'objet
  // Définition de la fonction à exécuter à chaque changement d'état
  xhr.onreadystatechange = function(){
  if (callback && xhr.readyState == 4 && xhr.status == 200){
  // Si le serveur a fini son travail
  // et que le code d'état indique que tout s'est bien passé
  // => On appelle la fonction callback en lui passant la réponse
    callback(xhr.responseText);
  }
  };
  xhr.open("GET", url, async); // Initialisation de l'objet
  xhr.send(); // Envoi de la requête
}


////////////////////////////////////////////////////////////////////////////////
//                  Partie concernant la page panier d'achat                  //
////////////////////////////////////////////////////////////////////////////////


window.onload = function(){

}
