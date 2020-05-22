

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
  var nbPersChange = document.getElementsByClassName("nbPersChange");
  for(elm of nbPersChange){
    elm.setAttribute("onclick", "changeNb(this)");
  }
}

function adaptPrix(iduser, nombre){
  var id = iduser.replace("add", "");
  var price = document.getElementById("P_"+id);
  var coeff = document.getElementById("C_"+id).value;
  console.log(coeff);
  console.log(price);
  var prix = price.innerHTML*nombre*coeff/(nombre-1);
  price.innerHTML = prix;
  console.log(prix);
}

// function getNombre(elm){
//   if (!elm){
//     return 1;
//   }
//   else{
//     return document.getElementsByClassName("nbPersSelected"+elm.id).length;
//   }
// }
