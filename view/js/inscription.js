$(function () {

  // Déclaration des variables
  var form = $("#form");
  var genre = $("#genre");
  var nom = $("#nom");
  var prenom = $("#prenom");
  var email = $("#email");
  var tel = $("#tel");
  var mdp = $("#mdp");
  var mdp_conf = $("#mdp_conf");
  var who = $("#who");
  var nom_entreprise = $("#nom_entreprise");
  var entreprise_hidden = $("#entreprise_hidden");
  entreprise_hidden.attr('hidden', true);
  var newletter = $("#newletter");
  var conditions = $("#conditions");
  var submit = $("#submit");

  var forms = [form, genre, nom, prenom, email, tel, mdp, mdp_conf, who, nom_entreprise, newletter, conditions];

  // Mise en place des listeners
  $.each(forms, function(i, elem) {
    elem.blur(function () {
      checkInput(elem);
    })
  });

  function checkInput(elem) {
    if (elem === genre || elem === who || elem === nom_entreprise) {
      if (elem.val() !== null) {
        elem.removeClass("is-invalid");
        elem.addClass("is-valid");
        return true;
      } else {
        elem.addClass("is-invalid");
        return false;
      }
    } else if (elem === nom || elem === prenom) {
      if (elem.val() !== '') {
        elem.removeClass("is-invalid");
        elem.addClass("is-valid");
        return true;
      } else {
        elem.addClass("is-invalid");
        return false;
      }
    } else if (elem === email) {
      if (/^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?(?:\.[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?)*$/i.test(elem.val())) {
        elem.removeClass("is-invalid");
        elem.addClass("is-valid");
        return true;
      } else {
        elem.addClass("is-invalid");
        return false;
      }
    } else if (elem === tel) {
      if (/^(01|02|03|04|05|06|08)[0-9]{8}/gi.test(elem.val())) {
        elem.removeClass("is-invalid");
        elem.addClass("is-valid");
        return true;
      } else {
        elem.addClass("is-invalid");
        return false;
      }
    } else if (elem === mdp) {
      if (/[A-Z]/.test(elem.val()) && /[0-9]/.test(elem.val()) && /^.{8,60}$/.test(elem.val())) {
        elem.removeClass("is-invalid");
        elem.addClass("is-valid");
        return true;
      } else {
        elem.addClass("is-invalid");
        return false;
      }
    } else if (elem === mdp_conf) {
      if (mdp.val() === elem.val() && elem.val() !== '') {
        elem.removeClass("is-invalid");
        elem.addClass("is-valid");
        return true;
      } else {
        elem.addClass("is-invalid");
        return false;
      }
    } else if (elem == conditions) {
      if (elem.prop('checked')) {
        $("#error").text("");
        return true;
      } else {
        $("#error").text("Veuillez accepter les conditions générales.");
        return false;
      }
    }
  }

  conditions.click(function(e) {
    $("#error").text("");
  })

  who.on('change', function() {
    if (this.value === "Entreprise") {
      entreprise_hidden.attr('hidden', false);
    } else {
      entreprise_hidden.attr('hidden', true);
    }
  })

  submit.click(function (e) {
    $.each(forms, function(i, elem) {
      checkInput(elem);
    });
    let valid = checkInput(genre) && checkInput(nom) && checkInput(prenom) && checkInput(email) && checkInput(tel) && checkInput(mdp) && checkInput(mdp_conf) && checkInput(who);
    if (!valid) {
      e.preventDefault();
    }
  })


});
