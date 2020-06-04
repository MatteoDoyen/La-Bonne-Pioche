


////////////////////////////////////////////////////////////////////////////////
// Code JS qui gère l'affichage dynamique de la page "panier d'achat" et la
// récupération des éléments enregistrés dans le localStorage
////////////////////////////////////////////////////////////////////////////////


// Déclaration de 2 tableaux :
//  commandes qui récupère les éléments du local storage
//  commandesAssoc qui stock les différents paniers sous la forme :
//    commandesAssoc[id_nbPersonnes]
// Et de 2 variables globales stockant le prix total des paniers sélectionnés
// ainsi que la tva calculée sur ce prix
var commandes = [];
var commandesAssoc = [];
var sumPPaniers;
var dontTva;

// Au chargement de la page on crée les différentes entités HTML des paniers
// en fonction de ceux qui ont été récupérés dans le storage
window.onload = function(){
  if(localStorage.getItem("panierAchat") != null){
    commandes = JSON.parse(localStorage.getItem("panierAchat"));
  }
  // creation des differentes instance de panier en HTML
  for(panier of commandes){
    var a = '<div class="row" id="ligne_'+panier.id+'_'+panier.nbPersonnes+'_'+panier.quantite+'"><input id="panier_'+panier.id+'_'+panier.nbPersonnes+'_'+panier.quantite+'" type="hidden" name="paniers[]" value="'+panier.id+'_'+panier.nbPersonnes+'_'+panier.quantite+'_'+panier.quantite+'"><div class="d-none d-sm-flex col-md-2 col-6 imgPanier"><img src="'+panier.img+'">  </div><div class="col-xs-12 col-sm-6 col-lg-4 libellePanier justify-content-start"><div class="d-flex flex-column"><p class="titrePanier" id="libelle_'+panier.id+'_'+panier.nbPersonnes+'_'+panier.quantite+'">'+panier.libelle+'</p><p class="nbPersPanier" id="nbPers_'+panier.id+'_'+panier.nbPersonnes+'_'+panier.quantite+'">Panier pour '+panier.nbPersonnes+' personnes</p> </div></div><div class="col-xs-12 col-sm-6 col-lg-2 quantPanier">  <button type="button" name="button" id="moins_'+panier.id+'_'+panier.nbPersonnes+'_'+panier.quantite+'" onclick="downQuantite(this)">-</button><input id="Q_'+panier.id+'_'+panier.nbPersonnes+'_'+panier.quantite+'" type="text" name="" value="'+panier.quantite+'"><button type="button" name="button" id="plus_'+panier.id+'_'+panier.nbPersonnes+'_'+panier.quantite+'" onclick="upQuantite(this)">+</button>  </div><div class="col-xs-6 col-sm-3 col-lg-2 prixPanier">  <p id="prix_'+panier.id+'_'+panier.nbPersonnes+'_'+panier.quantite+'">'+panier.prix*panier.quantite+'</p><p>€</p>  </div>  <div class="col-xs-6 col-sm-3 col-lg-1 supprPanier"><button type="button" name="button" id="suppr_'+panier.id+'_'+panier.nbPersonnes+'_'+panier.quantite+'" onclick="supprimerPanier(this)">x</button>  </div><hr></div>';
    commandesAssoc[panier.id+'_'+panier.nbPersonnes] = panier;

    refreshTotaux();

    let divPanier = $("#paniersCommande");
    divPanier.append(a);
  }
}


// Diminue les quantités (affichage + données stockées)
function downQuantite(elm){
  // on récupère l'identifiant que l'on split. Ainsi, on a accès à l'id
  // d'un panier, à son nombre de personnes
  let idPanierSplit = elm.id.split('_');
  let idPanier = idPanierSplit[1];
  let nbPersonnes = idPanierSplit[2];
  let quant = idPanierSplit[3];
  let article = commandesAssoc[idPanier+'_'+nbPersonnes];
  let index = commandes.indexOf(article);
  let quantite = document.getElementById('Q_'+idPanier+'_'+nbPersonnes+'_'+quant);
  // Gestion du cas limite (on ne peut pas descendre dans des quantités nulles
  // ou négatives)
  if(quantite.value <= 1 ){
    commandesAssoc[idPanier+'_'+nbPersonnes].quantite = 1;

  }
  else{

    quantite.value = parseInt(quantite.value)-1;
    commandesAssoc[idPanier+'_'+nbPersonnes].quantite = quantite.value;
    let prixAffiche = document.getElementById("prix_"+idPanier+'_'+nbPersonnes+'_'+quant);

    console.log(commandesAssoc[idPanier+'_'+nbPersonnes].prix/(quantite.value+1) * quantite.value);
    prixAffiche.innerHTML = commandesAssoc[idPanier+'_'+nbPersonnes].prix * quantite.value;
  }
  console.log(quantite.value);
  commandes[index].quantite = quantite.value;
  //mise à jour du storage
  localStorage.removeItem("panierAchat");
  localStorage.setItem("panierAchat", JSON.stringify(commandes) );
  refreshTotaux();
}

// fonction similaire à downQuantite mais qui n'a pas besoin de gérer un
// cas limite
function upQuantite(elm){
  let idPanierSplit = elm.id.split('_');
  let idPanier = idPanierSplit[1];
  let nbPersonnes = idPanierSplit[2];
  let quant = idPanierSplit[3];
  let article = commandesAssoc[idPanier+'_'+nbPersonnes];
  let index = commandes.indexOf(article);
  let quantite = document.getElementById('Q_'+idPanier+'_'+nbPersonnes+'_'+quant);

  quantite.value = parseInt(quantite.value)+1;
  commandesAssoc[idPanier+'_'+nbPersonnes].quantite = quantite.value;
  console.log(commandesAssoc[idPanier+'_'+nbPersonnes]);

  let prixAffiche = document.getElementById("prix_"+idPanier+'_'+nbPersonnes+'_'+quant);

  console.log(commandesAssoc[idPanier+'_'+nbPersonnes].prix/(quantite.value+1) * quantite.value);
  prixAffiche.innerHTML = quantite.value * commandesAssoc[idPanier+'_'+nbPersonnes].prix;

  commandes[index].quantite = quantite.value;
  localStorage.removeItem("panierAchat");
  localStorage.setItem("panierAchat", JSON.stringify(commandes) );
  refreshTotaux();
}


// Supprime un panier de la vue ainsi que du tableau "commandes" et du storage
function supprimerPanier(elm){
  let id = elm.id.split('_');
  let idPanier = id[1];
  let nbPersonnes = id[2];
  let article = commandesAssoc[idPanier+'_'+nbPersonnes];
  let index = commandes.indexOf(article);

  let node = $('#ligne_'+id[1]+'_'+id[2]+'_'+id[3]);

  node.remove();

  localStorage.removeItem("panierAchat");

  commandes.splice(commandes.indexOf(commandesAssoc[id[1]+'_'+id[2]]),1);

  localStorage.setItem("panierAchat",JSON.stringify(commandes));
  refreshTotaux();
}


// Met à jour les prix totaux des paniers sélectionnés
function refreshTotaux(){
  let sum1 = 0;
  for(panier of commandes){
    sum1 += panier.prix * panier.quantite;
  }
  sumPPaniers = sum1;
  dontTva = Math.round(0.055 * sum1*100)/100;

  let totauxP = document.getElementById("totalPaniers");
  totauxP.innerHTML = sumPPaniers+"€";
  let tva = document.getElementById("tva");
  tva.innerHTML = dontTva+"€";
  let aPayer = document.getElementById("totalAPayer");
  aPayer.innerHTML = sumPPaniers+"€";

}



function commander(){
  $("#formulaireCommande").submit();
}
