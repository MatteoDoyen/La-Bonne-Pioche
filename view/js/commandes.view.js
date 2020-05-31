

var commandes = [];

window.onload = function(){
  if(localStorage.getItem("panierAchat") != null){
    let temp = JSON.parse(localStorage.getItem("panierAchat"));
    console.log(commandes);
    commandes = temp;
  }
  console.log(commandes);
  let divCommandes = document.getElementById("paniersCommande");
  for(panier of commandes){
    console.log(panier.id);
    var a = '<figure class="container test"><div class="row container_row"><a class ="lien_img col-xs-1 col-sm-1 col-lg-1"><img src="'+panier.img+'">';
    let b = '</a><div class="col-xs-1 col-sm-1 col-md-1 col-lg-1 compo-txt-prod"><p>'+panier.libelle+'<p>Panier pour '+panier.nbPersonnes+' personnes</p></p></div><div class="col-xs-1 col-sm-1 col-md-1 col-lg-1 compo-txt-origin">';
    let c = '<button id="boutonMoins_'+panier.id+'" type="button" name="button" onclick="moinsPanier(this);">-</button>';
    let d = '<input type="text" name="" class="inputQuantite" id="Q_'+panier.id+'" value="1" ><button id="boutonPlus_'+panier.id+'" type="button" name="button" onclick="plusPanier(this);">+</button></div>';
    let e = '<div class="col-xs-1 col-sm-1 col-md-1 col-lg-1 compo-txt-origin"><p>'+panier.prix*panier.quantite+'</p><p>€</p></div>';
    let f = '<div class="col-xs-1 col-sm-1 col-md-1 col-lg-1 compo-txt-origin"><button id="croix"'+panier.id+'">x</button></div></div></div></figure>';

    let divPanier = document.createElement('div');
    divPanier.id = "divPanier"+panier.id;
    divPanier.class = "divPanier";
    divPanier.innerHTML = a+b+c+d+e+f;
    divCommandes.append(divPanier);


  }
}
