
document.querySelector("#imgPlus").onclick=ajoutImage;

var $inputImage;
var inputImage;
var imageUpload;
var btnSupprimer;
var imgPreview;
var $toutLesProduits;
var enterTarget = null;
var rechercheProduit;
var tabProd = [];
var tabCompo = [];
var $boutonSubmit;
var $compositionPanier;

$boutonSubmit = $('#boutonSubmit');
$boutonSubmit.attr('onclick','submitForm()');
$compositionPanier = $("#compositionPanier");
$toutLesProduits = $("#toutLesProduits");
imagePreview = document.getElementById('imgPreview');
imagePreview.style.visibility ='hidden';
$inputImage = $('#inputImage');
inputImage = document.getElementById('inputImage');
imageUpload = document.getElementById('imageUpload');
btnSupprimer = document.getElementById("btnSupprimer");
btnSupprimer.onclick = supprimerImage;
btnSupprimer.style.visibility = 'hidden';
rechercheProduit = document.getElementById("rechercheProduit");

$.get("../controlers/tousLesProduits.ctrl.php").then(maj_resultats).catch(error => {console.log(error)}).done(() => ajoutProduit());

rechercheProduit.addEventListener("keyup", (e) => {

  const rechercheChar = e.target.value.toLowerCase();
  const produitFiltrer = tabProd.filter(character =>{
    return character.name.toLowerCase().includes(rechercheChar) || character.fabricant.toLowerCase().includes(rechercheChar);
  });

  displayCharacters(produitFiltrer);

});

const displayCharacters = (produitFiltrer) => {
    const htmlString = produitFiltrer
        .map((elt) => {
            return '<figure class="container" id="produit_'+elt.refProduit+'" ><div class="row container_row"><div class="row_image"><img class="img_search" src="'+elt.url+'"></div><div class="col-xs-1 col-sm-2 compo-txt-prod"><p>'+elt.name+'</p></div><div class="col-xs-4 compo-txt-origin"><p class="qteProd">'+parseInt(elt.quantite)+' '+elt.unite+'</p></div><div class="col-xs-4 col-sm-6 col-md-3 compo-txt-origin"><p>'+elt.fabricant+'</p></div><div class="col-lg-1 boutonAjout"><button id="boutonAjout_'+elt.refProduit+'" type="button" onclick="ajoutProduitCompo(this)" >+</button></div></div><hr><input id="input_'+elt.refProduit+'" name="prod[]" type="hidden" value="'+elt.refProduit+'_1"></figure>';


        });
    $toutLesProduits.html(htmlString);
};



function ajoutImage()
{
  $inputImage.trigger('click');
}

function ajoutProduit()
{
  for (elt of tabProd)
  {
    $toutLesProduits.append('<figure class="container" id="produit_'+elt.refProduit+'" ><div class="row container_row"><div class="row_image"><img class="img_search" src="'+elt.url+'"></div><div class="col-xs-1 col-sm-2 compo-txt-prod"><p>'+elt.name+'</p></div><div class="col-xs-4 compo-txt-origin"><p class="qteProd">'+parseInt(elt.quantite)+' '+elt.unite+'</p></div><div class="col-xs-4 col-sm-6 col-md-3 compo-txt-origin"><p>'+elt.fabricant+'</p></div><div class="col-lg-1 boutonAjout"><button id="boutonAjout_'+elt.refProduit+'" type="button" onclick="ajoutProduitCompo(this)" >+</button></div></div><hr><input id="input_'+elt.refProduit+'" name="prod[]" type="hidden" value="'+elt.refProduit+'_1"></figure>');
  }

}
function ajoutProduitCompo(btn)
{

  let id = btn.id;
  id = id.split('_');
  id = id[1];

  //let test =  $("#produit_"+id);

  let produit = document.getElementById("produit_"+id);


  boutonPlus = document.createElement('p');
  boutonPlus.textContent = "+";
  boutonPlus.id = 'boutonPlus_'+id;
  boutonPlus.className = "boutonPlusProd";
  boutonPlus.setAttribute("onclick","ajouterUniteProd(this)");

  produit.getElementsByClassName("compo-txt-origin")[0].appendChild(boutonPlus);

  let affichageQute = produit.getElementsByClassName("qteProd")[0];

  affichageQute.innerHTML = '<span id="valeurQute_'+id+'">1 x </span>'+affichageQute.textContent;

  btn.innerHTML  = "x";

  btn.removeAttribute("onclick");

  btn.setAttribute("onclick","supprimerProduitCompo(this)")

  btn.style.fontSize ="20px";

  btn.style.color = "#F3493D";

  index = tabProd.map(function(e) {return e.refProduit}).indexOf(id);

  tabCompo.push(tabProd[index]);

  tabProd.splice(index,1);

  $compositionPanier.append($(produit)).children(':last').hide().fadeIn(1000);
  // test.fadeOut(300, function() {
  //     $("#produit_"+id).remove();
  //   });

}

function supprimerProduitCompo(btn)
{


  let id = btn.id;
  id = id.split('_');
  id = id[1];

  let produit = document.getElementById("produit_"+id);

  let boutonPlus = document.getElementById('boutonPlus_'+id);

  produit.getElementsByClassName("compo-txt-origin")[0].removeChild(boutonPlus);

  let affichageQute = produit.getElementsByClassName("qteProd")[0];

  let span = document.getElementById('valeurQute_'+id);

  affichageQute.removeChild(span);

  btn.removeAttribute("onclick");

  btn.setAttribute("onclick","ajoutProduitCompo(this)")

  btn.innerHTML  = "+";

  btn.style.fontSize ="35px";

  btn.style.color = "#bfc416";

  let input = document.getElementById('input_'+id);

  input.value = id+'_'+1;

  index = tabCompo.map(function(e) {return e.refProduit}).indexOf(id);

  tabProd.push(tabCompo[index]);

  tabCompo.splice(index,1);



  $toutLesProduits.prepend(produit).children(':last').hide().fadeIn(1000);
}

function ajouterUniteProd(btn)
{
  let id = btn.id;
  id = id.split('_');
  id = id[1];

  // cette input nous permet de stocker la quantité du produit ajouter dans le panier, sa valeur est composé comme ceci = "id_quantité"
  // exemple "1_3" veux dire : 3 fois le produit avec l'id n°1
  let input = document.getElementById('input_'+id);
  let quantite = document.getElementById('valeurQute_'+id);

  textQuantite = quantite.textContent.split(' ');

  if(parseInt(textQuantite[0])==1)
  {
    boutonMoins = document.createElement('p');
    boutonMoins.textContent = "-";
    boutonMoins.id = 'boutonMoins_'+id;
    boutonMoins.className = "boutonMoinsProd";
    boutonMoins.setAttribute("onclick","supprimerUniteProd(this)");
    quantite.parentNode.parentNode.append(boutonMoins);


    let nouvelleQte = parseInt(textQuantite[0])+1;
    quantite.textContent=nouvelleQte+' x ';
    input.value = id+'_'+nouvelleQte;

  }
  else if(parseInt(textQuantite[0])>1)
  {
    let nouvelleQte = parseInt(textQuantite[0])+1;
    quantite.textContent=nouvelleQte+' x ';
    input.value = id+'_'+nouvelleQte;
  }
  //affichageQute.textContent = "1 x "+affichageQute.textContent;
}

function supprimerUniteProd(btn)
{
  let id = btn.id;
  id = id.split('_');
  id = id[1];

  // cette input nous permet de stocker la quantité du produit ajouter dans le panier, sa valeur est composé comme ceci = "id_quantité"
  // exemple "1_3" veux dire : 3 fois le produit avec l'id n°1
  let input = document.getElementById('input_'+id);

  let quantite = document.getElementById('valeurQute_'+id);

  textQuantite = quantite.textContent.split(' ');

  if(parseInt(textQuantite[0])==2)
  {
    boutMoins = document.getElementById('boutonMoins_'+id);
    quantite.parentNode.parentNode.removeChild(boutMoins);

    let nouvelleQte = parseInt(textQuantite[0])-1;
    quantite.textContent=nouvelleQte+' x ';
    input.value = id+'_'+nouvelleQte;
  }
  else if(parseInt(quantite.textContent)>2)
  {
    let nouvelleQte = parseInt(textQuantite[0])-1;
    quantite.textContent=nouvelleQte+' x ';
    input.value = id+'_'+nouvelleQte;
  }
}

function submitForm()
{
  var form = document.querySelector('form');

  if(form.reportValidity())
  {
    $("#form1").submit();
  }
}


function readURL(input) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();

    reader.onload = function(e) {
      imagePreview.src =e.target.result;
      imagePreview.style.visibility ='visible';
      //imageUpload.style.backgroundImage = "url('"+e.target.result+"')";
      $('#imgPlus').fadeOut();
      document.getElementById("imageUpload").addEventListener('mouseout',onMouseOut,true);
      document.getElementById("imageUpload").addEventListener('mouseover',onMouseOver,true);
      btnSupprimer.style.visibility = "visible";
    }

    reader.readAsDataURL(input.files[0]); // convert to base64 string
  }
}

function supprimerImage()
{
  inputImage.value = '';
  imagePreview.style.visibility ='hidden';
  imagePreview.removeAttribute('src');
  imageUpload.removeEventListener('mouseout',onMouseOut,true);
  imageUpload.removeEventListener('mouseover',onMouseOver,true);
  $('#imgPlus').fadeIn(100);
  btnSupprimer.style.visibility = "hidden";
}

function onMouseOut(event)
{

  var e = event.toElement || event.relatedTarget;
    if (e.parentNode == this || e == this) {
        return;
    }
    // handle mouse event here!
  imagePreview.style.filter = "none";
  $('#imgPlus').fadeOut(100);

}

function onMouseOver(event)
{

  imagePreview.style.filter = "grayscale(80%)";
  $('#imgPlus').fadeIn(100);

}

$("#inputImage").change(function() {
  readURL(this);
});


function maj_resultats(res) {
  tabProd = JSON.parse(res);
}


document.getElementById('imageUpload').addEventListener('dragenter', function(event) {
  enterTarget = event.target;
  event.stopPropagation();
  event.preventDefault();

  imageUpload.style.borderStyle = 'dashed';
});

document.getElementById('imageUpload').addEventListener('dragleave', function(event) {
  if (enterTarget == event.target){
      event.stopPropagation();
      event.preventDefault();
      imageUpload.style.borderStyle = 'solid';
  }
});


document.getElementById('imageUpload').addEventListener('dragover', function(e) {
    e.preventDefault(); // Annule l'interdiction de drop
});

document.addEventListener('dragend', function() {
    //console.log("Un Drag & Drop vient de se terminer mais l'événement dragend ne sait pas si c'est un succès ou non.");
});


document.getElementById("imageUpload").addEventListener('drop', function(e) {
    e.preventDefault(); // Cette méthode est toujours nécessaire pour éviter une éventuelle redirection inattendue

    inputImage.files = e.dataTransfer.files;

    readURL(inputImage);
    // Il est nécessaire d'ajouter cela car sinon le style appliqué par l'événement « dragenter » restera en place même après un drop :
    imageUpload.style.borderStyle = 'solid';
});
