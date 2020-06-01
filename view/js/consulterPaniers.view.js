
function envoieFormulaireEdit(elt)
{
  id = elt.id.split('_')[1];
  $("#formulaireEdit_"+id).submit();
  console.log(id);
}

function envoieFormulaireSupprimer(elt)
{
  $("#formulaireSupprimer_"+id).submit();
}
function supprimerPanier(elt)
{
  id = elt.id.split('_')[1];
  $('body').prepend('<div id="alertSuppressionBg" onclick="annulationSuppression()" ></div><div id="alertSuppressionMessage"><p>Étes-vous sûr de vouloir supprimer le panier ?</p><div class=""><button type="button" name="button" id="boutonAlertSupprimer_'+id+'" class="boutonAlertSupprimer" onclick="envoieFormulaireSupprimer(this)" >Oui supprimer</button><button type="button" name="button" id="boutonAlertAnnuler_'+id+'" class="boutonAlertAnnuler" onclick="annulationSuppression()" >Non annuler</button></div></div>').hide()
        .fadeIn(400);
  $('body').css('overflow','hidden');
}

function annulationSuppression()
{
  $('#alertSuppressionBg').fadeOut(400);
  $('#alertSuppressionMessage').fadeOut(400);
  setTimeout(function(){
    $('#alertSuppressionBg').remove();
    $('#alertSuppressionMessage').remove();
    $('body').css('overflow','visible');
}, 400);

}
