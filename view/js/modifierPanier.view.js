
document.querySelector("#imgPlus").onclick=ajoutImage;

var enterTarget = null;
var tabProd = [];
var tabCompo = [];
var tabTemp =[];

var $boutonSubmit = $('#boutonSubmit');
$boutonSubmit.attr('onclick','submitForm()');
var $compositionPanier = $("#compositionPanier");
var $toutLesProduits = $("#toutLesProduits");
var imagePreview = document.getElementById('imgPreview');
$('#imgPlus').fadeOut();

var $idPanier = $('#idPanier');
var $inputImage = $('#inputImage');
var inputImage = document.getElementById('inputImage');
var imageUpload = document.getElementById('imageUpload');
var btnSupprimer = document.getElementById("btnSupprimer");
btnSupprimer.onclick = supprimerImage;
btnSupprimer.style.visibility = 'hidden';
var rechercheProduit = document.getElementById("rechercheProduit");

var $cacheProduit = $(".cacheProduit");

var $boutonEditionInput = $(".boutonEditionInput");
$boutonEditionInput.attr('onclick', 'editerInput(this)');




////////////////
$.get("../controlers/tousLesProduits.ctrl.php").then(maj_resultats).catch(error => {console.log(error)}).done(() => ajoutProduit());


///////////////




rechercheProduit.addEventListener("keyup", (e) => {

  const rechercheChar = e.target.value.toLowerCase();
  const produitFiltrer = tabProd.filter(character =>{
    return character.name.toLowerCase().includes(rechercheChar) || character.fabricant.toLowerCase().includes(rechercheChar);
  });

  displayCharacters(produitFiltrer);

});


function editerInput(elt)
{
  let id = elt.id.split('_')[1];

  let input = $('#'+id);

  elt.textContent = "OK" ;

  elt.style.color = "green";

  input.removeAttr('readonly')

  elt.removeAttribute('onclick');

  elt.setAttribute('onclick','sauvegarderInput(this)');

}

function sauvegarderInput(elt)
{

  let id = elt.id.split('_')[1];

  let input = $('#'+id);

  let img = document.createElement('img');

  img.setAttribute('src','../others/SVG/edit.svg');

  elt.textContent ="";

  elt.append(img);

  elt.style.color = "grey";

  input.attr("readonly","true");

  elt.removeAttribute('onclick');

  elt.setAttribute('onclick','editerInput(this)');

}

const displayCharacters = (produitFiltrer) => {
    const htmlString = produitFiltrer
        .map((elt) => {
            return '<figure class="container" id="produit_'+elt.refProduit+'" ><div class="row container_row"><div class="row_image"><img class="img_search" src="'+elt.url+'"></div><div class="col-xs-1 col-sm-2 compo-txt-prod"><p>'+elt.name+'</p></div><div class="col-xs-4 compo-txt-origin"><p class="qteProd">'+parseInt(elt.quantite)+' '+elt.unite+'</p></div><div class="col-xs-4 col-sm-6 col-md-3 compo-txt-origin"><p>'+elt.fabricant+'</p></div><div class="col-lg-1 boutonAjout"><button id="boutonAjout_'+elt.refProduit+'" type="button" onclick="ajoutProduitCompo(this)" >+</button></div></div><hr><input id="input_'+elt.refProduit+'" name="prod[]" type="hidden" value="'+elt.refProduit+'_1"></figure>';


        });
    $toutLesProduits.html(htmlString);
};

function editInputImage(btn)
{
  let id = btn.id.split('_')[1];

  let input = $('#'+id);

  btn.textContent = "OK" ;

  btn.style.color = "green";

  input.removeAttr('readonly')

  btn.removeAttribute('onclick');

  btn.setAttribute('onclick','sauvegarderInputImage(this)');

  document.getElementById("imageUpload").addEventListener('mouseout',onMouseOut,true);
  document.getElementById("imageUpload").addEventListener('mouseover',onMouseOver,true);
  btnSupprimer.style.visibility = "visible";

  //input.removeAttr('disabled');
}

function sauvegarderInputImage(btn)
{
  let id = btn.id.split('_')[1];

  let input = $('#'+id);

  let img = document.createElement('img');

  img.setAttribute('src','../others/SVG/edit.svg');

  btn.textContent ="";

  btn.append(img);

  btn.style.color = "grey";

  input.attr("readonly","true");

  btn.removeAttribute('onclick');

  btn.setAttribute('onclick','editInputImage(this)');

  imageUpload.removeEventListener('mouseout',onMouseOut,true);

  imageUpload.removeEventListener('mouseover',onMouseOver,true);

  btnSupprimer.style.visibility = "hidden";
}

function editInputCompo(elt)
{
  $boutonAjoutPanierCompo.css("display","block");

  elt.textContent = "OK" ;

  elt.style.color = "green";

  elt.removeAttribute('onclick');

  $cacheProduit.css('display','none');

  elt.setAttribute('onclick','sauvegarderInputCompo(this)');

}

function sauvegarderInputCompo(elt)
{
  $boutonAjoutPanierCompo.css("display","none");

  let img = document.createElement('img');

  img.setAttribute('src','../others/SVG/edit.svg');

  elt.textContent ="";

  elt.append(img);

  elt.style.color = "grey";

  elt.removeAttribute('onclick');

  $cacheProduit.css('display','block');

  elt.setAttribute('onclick','editInputCompo(this)');
}

function ajoutImage()
{
  $inputImage.trigger('click');
}

function ajoutProduit()
{

  let compositionPanier = document.getElementById('compositionPanier');
  let figuresCompo = compositionPanier.getElementsByClassName('compo-txt-prod');
  figuresCompo = figuresCompo[0].getElementsByTagName('p');

  $libelleCompPanier = $("#compositionPanier").find(".compo-txt-prod");
  $libelleCompPanier = $libelleCompPanier.find("p");

  tabCompo = tabProd.filter(character =>{
    for(libelle of $libelleCompPanier)
    {
      if(libelle.innerHTML==character.name)
      {
        return true;
      }
    }
  });

  tabProd = tabProd.filter(character =>{
    for(libelle of $libelleCompPanier)
    {
      if(libelle.innerHTML==character.name)
      {
        return false;
      }
    }
    return true;

  });

  for (elt of tabProd)
  {
    $toutLesProduits.append('<figure class="container" id="produit_'+elt.refProduit+'" ><div class="row container_row"><div class="row_image"><img class="img_search" src="'+elt.url+'"></div><div class="col-xs-1 col-sm-2 compo-txt-prod"><p>'+elt.name+'</p></div><div class="col-xs-4 compo-txt-origin"><p class="qteProd">'+parseInt(elt.quantite)+' '+elt.unite+'</p></div><div class="col-xs-4 col-sm-6 col-md-3 compo-txt-origin"><p>'+elt.fabricant+'</p></div><div class="col-lg-1 boutonAjout"><button id="boutonAjout_'+elt.refProduit+'" type="button" onclick="ajoutProduitCompo(this)" >+</button></div></div><hr><input id="input_'+elt.refProduit+'" name="prod[]" type="hidden" value="'+elt.refProduit+'_1"></figure>');
  }

  $boutonAjoutPanierCompo = $('.boutonAjout').find('button');
}
function ajoutProduitCompo(btn)
{

  let id = btn.id.split('_')[1];

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


  let id = btn.id.split('_')[1];

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
  let id = btn.id.split('_')[1];

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
  let id = btn.id.split('_')[1];

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
    console.log(input.files[0]);
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
