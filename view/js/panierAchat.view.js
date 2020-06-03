

var commandes = [];
var commandesAssoc = [];

window.onload = function(){
  if(localStorage.getItem("panierAchat") != null){
    commandes = JSON.parse(localStorage.getItem("panierAchat"));
  }

  for(panier of commandes){
    var a = '<div class="row" id="ligne_'+panier.id+'_'+panier.nbPersonnes+'"><input id="panier_'+panier.id+'_'+panier.nbPersonnes+'" type="hidden" name="paniers[]" value="'+panier.id+'_'+panier.nbPersonnes+'_'+panier.quantite+'"><div class="d-none d-sm-flex col-md-2 col-6 imgPanier"><img src="'+panier.img+'">  </div><div class="col-xs-12 col-sm-6 col-lg-4 libellePanier justify-content-start"><div class="d-flex flex-column"><p class="titrePanier" id="libelle_'+panier.id+'_'+panier.nbPersonnes+'">'+panier.libelle+'</p><p class="nbPersPanier" id="nbPers_'+panier.id+'_'+panier.nbPersonnes+'">Panier pour '+panier.nbPersonnes+' personnes</p> </div></div><div class="col-xs-12 col-sm-6 col-lg-2 quantPanier">  <button type="button" name="button" id="moins_'+panier.id+'_'+panier.nbPersonnes+'" onclick="downQuantite(this)">-</button><input id="Q_'+panier.id+'_'+panier.nbPersonnes+'" type="text" name="" value="'+panier.quantite+'"><button type="button" name="button" id="plus_'+panier.id+'_'+panier.nbPersonnes+'" onclick="upQuantite(this)">+</button>  </div><div class="col-xs-6 col-sm-3 col-lg-2 prixPanier">  <p id="prix_'+panier.id+'_'+panier.nbPersonnes+'">'+panier.prix*panier.quantite+'</p><p>€</p>  </div>  <div class="col-xs-6 col-sm-3 col-lg-1 supprPanier"><button type="button" name="button" id="suppr_'+panier.id+'_'+panier.nbPersonnes+'" onclick="supprimerPanier(this)">x</button>  </div><hr></div>';
    commandesAssoc[panier.id+'_'+panier.nbPersonnes] = panier;

    let divPanier = $("#paniersCommande");
    divPanier.append(a);
  }
}


function downQuantite(elm){
  let idPanierSplit = elm.id.split('_');
  let idPanier = idPanierSplit[1];
  let nbPersonnes = idPanierSplit[2];
  let quantite = document.getElementById('Q_'+idPanier+'_'+nbPersonnes);
  console.log(quantite.value);
  console.log(nbPersonnes);
  if(quantite.value <= 1 ){
    commandesAssoc[idPanier+'_'+nbPersonnes].quantite = 1;

  //   for(panier of commandes){
  //     if(panier.id == idPanier && panier.nbPersonnes == nbPersonnes ){
  //       quantite.value = 1;
  //       console.log(quantite);
  //
  //       // let index = commandes.indexOf(panier);
  //       // console.log("commandes : "+commandes[index]);
  //       // delete commandes[index];
  //       //
  //       // console.log("commandes : "+commandes);
  //       //
  //       // console.log(commandes.index);
  //       // localStorage.removeItem(commandes.index);
  //       //
  //       // console.log("localStorage : "+localStorage);
  //
  //       // let node = document.getElementById("ligne_"+panier.id+"_"+panier.nbPersonnes);
  //       // console.log("id : "+panier.id+" nbpersonnes : "+panier.nbPersonnes);
  //       //
  //       // console.log(node);
  //       // node.parentNode.removeChild(node);
  //
  //     }
  //   }
  //   //delete commandes.elm;
  }
  else{

    quantite.value = parseInt(quantite.value)-1;
    commandesAssoc[idPanier+'_'+nbPersonnes].quantite = quantite.value;
    console.log(commandesAssoc[idPanier+'_'+nbPersonnes]);
    let prixAffiche = document.getElementById("prix_"+idPanier+'_'+nbPersonnes).innerHTML;
    prixAffiche.innerHTML = commandesAssoc[idPanier+'_'+nbPersonnes].prix/(quantite.value+1) * quantite.value;
  }
}

function upQuantite(elm){
  let idPanierSplit = elm.id.split('_');
  let idPanier = idPanierSplit[1];
  let nbPersonnes = idPanierSplit[2];
  let quantite = document.getElementById('Q_'+idPanier+'_'+nbPersonnes);

  quantite.value = parseInt(quantite.value)+1;
  commandesAssoc[idPanier+'_'+nbPersonnes].quantite = quantite.value;
  console.log(commandesAssoc[idPanier+'_'+nbPersonnes]);

}


function supprimerPanier(elm){
  let id = elm.id.split('_');

  console.log(id);
  let node = $('#ligne_'+id[1]+'_'+id[2]);

  node.remove();

  localStorage.removeItem("panierAchat");

  commandes.splice(commandes.indexOf(commandesAssoc[id[1]+'_'+id[2]]));

  localStorage.setItem("panierAchat",JSON.stringify(commandes));

}



function commander(){
  $("#formulaireCommande").submit();
}


function reloadStorage(){

}
