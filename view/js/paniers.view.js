


////////////////////////////////////////////////////////////////////////////////
// Ce code JS gère l'aspect dynamique de la page "paniers"
// en mettant à jour l'affichage des différentes informations
// en fonction des actions de l'utilisateur
////////////////////////////////////////////////////////////////////////////////


// Déclaration de 2 tableaux stochant les infos sur le nombre de personnes
// et le prix initial de chaque panier en fonction de leur id (refPanier)
var nbpersonnes = [];
var tabprixinit = [];



// permet l'affichage supplémentaire d'icône de personne représentant le
// nombre de personnes pour lequel le panier est fait
function insertAfter(newNode, referenceNode) {

  referenceNode.parentNode.insertBefore(newNode, referenceNode.nextSibling);
}

// Initialisation de l'affichage de la page
window.onload = function(){
  let nbpersmoins = document.getElementsByClassName("nbPersMoins");
  for(elm of nbpersmoins){
    elm.style.display = 'none';
    let id = elm.id.replace("nbPersMoins", "");
    nbpersonnes[id] = 1;
  }
  let nbpersplus = document.getElementsByClassName("nbPersPlus");
  for(elm of nbpersplus){
    elm.setAttribute("onclick","ajoutPersonne(this)");
  }
  let prix_inits = document.getElementsByClassName("prix");
  for(elm2 of prix_inits){
    let idprix = elm2.id.replace("P_","");
    tabprixinit[idprix] = elm2.innerHTML;
  }
  console.log(tabprixinit);
}


// appelé lors d'un click sur le bouton qui augmente le nombre de personnes
// pour lequel le panier est fait
function ajoutPersonne(elm){
  let id = elm.id.replace("nbPersPlus","");
  // -Si le nombre de personnes est inférieur à 4 (nombre maximum de personnes
  // pour un panier) on augmente le nombre de personnes de 1
  if(nbpersonnes[id]<4){
    let elmparent = document.getElementById("nbPersSelectedadd"+id);
    let elm2 = elmparent.cloneNode([true]);
    insertAfter(elm2,elmparent);
    elm2.id = elm2.id+nbpersonnes[id];
    nbpersonnes[id]++;
  }
  // -Si le nombre de personnes vaut 2 (après l'incrémentation précédente) c'est
  // qu'il vallait 1 avant, on rend donc visible le bouton permettant de diminuer
  // le nombre de personnes
  if(nbpersonnes[id]==2){
    elm3 = document.getElementById("nbPersMoins"+id);
    elm3.style.display = 'block';
    elm3.setAttribute("onclick","removePersonne(this)");
  }
  // -Si le nombre de personnes vaut 4 alors on cache le bouton d'incrémentation
  // du nombre de personnes
  if(nbpersonnes[id]==4){
    elm.style.display = 'none';
    elm.removeAttribute("onclick");
  }
  // on fait un appel à la fonction qui change le prix affiché en fonction
  // du nombre de personnes et du coefficient
  adaptPrixNombre(id, true);

}

// Fonction très similaire à ajoutPersonne mais qui permet de décrémenter
// le nombre de personnes pour un panier
function removePersonne(elm){
  let id = elm.id.replace("nbPersMoins","");
  if(nbpersonnes[id]>1){
    let idnbpers = id+""+nbpersonnes[id]-1;
    document.getElementById("nbPersSelectedadd"+idnbpers).remove();
    nbpersonnes[id]--;
  }
  if(nbpersonnes[id] == 1){
    elm.style.display = 'none';
    elm.removeAttribute("onclick");
  }
  if(nbpersonnes[id] == 3){
    elm3 = document.getElementById("nbPersPlus"+id);
    elm3.style.display = 'block';
    elm3.setAttribute("onclick","ajoutPersonne(this)");
  }
  adaptPrixNombre(id, false);
}


// Met à jour l'affichage du prix d'un panier en fonction du nombre de personnes
function adaptPrixNombre(id, multiplicateur){

  var price = document.getElementById("P_"+id);
  var coeff = document.getElementById("C_"+id).value;
  var prix = Number(price.innerHTML);
  if(nbpersonnes[id] != 1){
    prix = Math.round(tabprixinit[id]*coeff*nbpersonnes[id]);
  }
  else prix = tabprixinit[id];
  price.innerHTML = prix;
}



// Décrémente la quantite de paniers et met à jour l'affichage lorque
// l'utilisateur click sur le bouton de décrémentation de la quantité
function moinsPanier(elm){
  let idPanier = elm.id.replace("boutonMoins_", "");
  let quantite = document.getElementById("Q_"+idPanier);
  if(quantite.value <= 0 ){
    quantite.value = 1;
  }
  if(quantite.value>1){
    quantite.value = quantite.value-1;
  }
}

// Incrémente la quantite de paniers et met à jour l'affichage lorque
// l'utilisateur click sur le bouton d'incrémentation de la quantité
function plusPanier(elm){
  let idPanier = elm.id.replace("boutonPlus_", "");
  let quantite = document.getElementById("Q_"+idPanier);
  if(quantite.value <= 0 ){
    quantite.value = 1;
  }
  let quant = quantite.value;
  quant++;
  quantite.value = quant;
}
