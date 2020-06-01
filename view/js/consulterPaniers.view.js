
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
  $('body').prepend('<div id="alertSuppressionBg"></div><div id="alertSuppressionMessage"><p>Étes-vous sûr de vouloir supprimer le panier ?</p><div class=""><button type="button" name="button" id="boutonAlertSupprimer_'+id+'" class="boutonAlertSupprimer" onclick="envoieFormulaireSupprimer(this)" >Oui supprimer</button><button type="button" name="button" id="boutonAlertAnnuler_'+id+'" class="boutonAlertAnnuler" onclick="annulationSuppression()" >Non annuler</button></div></div>');
  $('body').css('overflow','hidden');
}

function annulationSuppression()
{
  $('#alertSuppressionBg').remove();
  $('#alertSuppressionMessage').remove();
  $('body').css('overflow','visible');
}
