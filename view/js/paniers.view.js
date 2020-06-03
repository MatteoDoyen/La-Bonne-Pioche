
var nbpersonnes = [];
var tabprixinit = [];


function changeNb(elm){
  var imageUser = document.getElementsByClassName("nbPersSelected"+elm.id);
  if(imageUser.length < 4){
    var clone = imageUser[0].cloneNode([true]);
    insertAfter(clone, imageUser[0]);
    adaptPrix(elm.id, imageUser.length);
  }

}

function insertAfter(newNode, referenceNode) {

  referenceNode.parentNode.insertBefore(newNode, referenceNode.nextSibling);
}

window.onload = function(){
  // var nbPersChange = document.getElementsByClassName("nbPersChange");
  // for(elm of nbPersChange){
  //   elm.setAttribute("onclick", "changeNb(this)");
  // }
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

function ajoutPersonne(elm){
  let id = elm.id.replace("nbPersPlus","");

  if(nbpersonnes[id]<4){
    let elmparent = document.getElementById("nbPersSelectedadd"+id);
    let elm2 = elmparent.cloneNode([true]);
    insertAfter(elm2,elmparent);
    let idClone = elm2.id.replace("nbPersSelectedadd", "");
    elm2.id = "nbPersSelectedadd"+idClone+(nbpersonnes[id]-1);
    nbpersonnes[id]++;
  }
  if(nbpersonnes[id]<=2){
    elm3 = document.getElementById("nbPersMoins"+id);
    elm3.style.display = 'block';
    elm3.setAttribute("onclick","removePersonne(this)");
  }

  if(nbpersonnes[id]>4){
    elm.style.display = 'none';
    elm.removeAttribute("onclick");
  }
  adaptPrixNombre(id, true);

}

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


function adaptPrixNombre(id, multiplicateur){

  var price = document.getElementById("P_"+id);
  var coeff = document.getElementById("C_"+id).value;
  coeff = 0.8;
  var prix = Number(price.innerHTML);
  if(nbpersonnes[id] != 1){
    prix = Math.round(tabprixinit[id]*coeff*nbpersonnes[id]);
  }
  else prix = tabprixinit[id];
  price.innerHTML = prix;
}




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
