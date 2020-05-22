var prix;
var affichePrix;
var textNbPersonne;
var prixNbPanier;
var afficheMoin = false;
var affichePlus = true;
var btnPlus ;
var moinUtilisateur;
var nombrePanierCommande;


window.onload = function ()
{
  btnPlus = document.getElementById("plusUtilisateur");
  nombrePanierCommande = document.getElementById("nombrePanierCommande");
  document.getElementById("plusUtilisateur").setAttribute("onclick","ajoutPersonne(this)");
  document.getElementById("moinUtilisateur").setAttribute("onclick","suppressionPersonne(this)");
  document.getElementById("boutonPlus").setAttribute("onclick","plusPanier()");
  document.getElementById("boutonMoins").setAttribute("onclick","moinPanier()");

  prix = document.getElementById("inputPrix").value;
  affichePrix = document.getElementById("affichePrix");
  textNbPersonne = document.getElementById("nb_personne_panier");
  coeffPanier = document.getElementById("coeffPanier").value;
  moinUtilisateur = document.getElementById("moinUtilisateur");
  moinUtilisateur.style.display = 'none';
}


function plusPanier()
{
  nombrePanierCommande.value=parseInt(nombrePanierCommande.value)+1;
}

function moinPanier()
{
  if(parseInt(nombrePanierCommande.value)>0)
  {
    nombrePanierCommande.value=parseInt(nombrePanierCommande.value)-1;
  }
}

function ajoutPersonne(btn)
{
  var utilisateurs = document.getElementsByClassName("iconUtilisateur");

  nbUtilisateur = utilisateurs.length;

  if(nbUtilisateur<4)
  {
    var clone = utilisateurs[0].cloneNode([true]);

    insertAfter(clone,utilisateurs[0]);
    textNbPersonne.innerHTML = "Pannier pour "+utilisateurs.length;
    affichePrix.innerHTML = ((nbUtilisateur+1)*coeffPanier*prix) +" €"
    nbUtilisateur++;
  }
  if(!afficheMoin&&nbUtilisateur>1&&nbUtilisateur<4)
  {
    console.log("lol");
    moinUtilisateur.style.display = 'block';
    afficheMoin=true;
  }
  else if(nbUtilisateur>3&&afficheMoin)
  {
    btn.style.display = 'none';
    affichePlus=false;
  }

}

function suppressionPersonne(btn)
{
  var utilisateurs = document.getElementsByClassName("iconUtilisateur");
  if(utilisateurs.length>1)
  {
    utilisateurs[utilisateurs.length-1].remove();
    textNbPersonne.innerHTML = "Pannier pour "+utilisateurs.length;
    affichePrix.innerHTML = ((utilisateurs.length)*coeffPanier*prix) +" €"
  }
  if(utilisateurs.length<2)
  {
    btn.style.display = 'none';
    afficheMoin=false;
  }
  if(utilisateurs.length<4&&!affichePlus)
  {
    btnPlus.style.display='block';
  }
}


function insertAfter(newNode, referenceNode) {
    referenceNode.parentNode.insertBefore(newNode, referenceNode.nextSibling);
}
