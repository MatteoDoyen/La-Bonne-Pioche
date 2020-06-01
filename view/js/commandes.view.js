

var commandes = [];

window.onload = function(){
  if(localStorage.getItem("panierAchat") != null){
    let temp = JSON.parse(localStorage.getItem("panierAchat"));
    console.log(commandes);
    commandes = temp;
  }

  for(panier of commandes){
    var a = '<div class="row" id="ligne_'+panier.id+'"><input id="panier_'+panier.id+'_'+panier.nbPersonnes+'" type="hidden" name="paniers[]" value="'+panier.id+'_'+panier.nbPersonnes+'_'+panier.quantite+'"><div class="d-none d-sm-flex col-sm-6 col-lg-3 imgPanier"><img src="'+panier.img+'" alt="">  </div><div class="col-xs-12 col-sm-6 col-lg-4 libellePanier justify-content-start"><div class="d-flex flex-column"><p class="titrePanier" id="libelle_'+panier.id+'_'+panier.nbPersonnes+'">'+panier.libelle+'</p><p class="nbPersPanier" id="nbPers_'+panier.id+'_'+panier.nbPersonnes+'">Panier pour '+panier.nbPersonnes+' personnes</p> </div></div><div class="col-xs-12 col-sm-6 col-lg-2 quantPanier">  <button type="button" name="button" id="moins_'+panier.id+'_'+panier.nbPersonnes+'">-</button><input type="text" name="" value="'+panier.quantite+'"><button type="button" name="button" id="plus_'+panier.id+'_'+panier.nbPersonnes+'">+</button>  </div><div class="col-xs-6 col-sm-3 col-lg-2 prixPanier">  <p id="prix_'+panier.id+'">'+panier.prix+'€</p>  </div>  <div class="col-xs-6 col-sm-3 col-lg-1 supprPanier"><button type="button" name="button" id="suppr_'+panier.id+'_'+panier.nbPersonnes+'">x</button>  </div><hr></div>';

    let divPanier = $("#paniersCommande");
    divPanier.append(a);
  }
}
