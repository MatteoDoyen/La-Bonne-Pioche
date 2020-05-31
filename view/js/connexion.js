$(function() {

  var mail = $("#mail");
  var mdp = $("#mdp");
  var who = $('#who')
  var submit = $("#submit");

  var forms = [mail, mdp, who];

  // Listener sur le blur de chaque champs
  $.each(forms, function(i, elem) {
    elem.blur(function() {
      checkInput(elem);
    })
  })

  function checkInput(elem) {
    if (elem === mail) {
      if (/^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?(?:\.[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?)*$/i.test(elem.val())) {
        elem.removeClass("is-invalid");
        elem.addClass("is-valid");
        return true;
      } else {
        elem.addClass("is-invalid");
        return false;
      }
    } else if (elem === who) {
      if (elem.val() !== null) {
        elem.removeClass("is-invalid");
        elem.addClass("is-valid");
        return true;
      } else {
        elem.addClass("is-invalid");
        return false;
      }
    } else {
      if (/[A-Z]/.test(elem.val()) && /[0-9]/.test(elem.val()) && /^.{8,60}$/.test(elem.val())) {
        elem.removeClass("is-invalid");
        elem.addClass("is-valid");
        return true;
      } else {
        elem.addClass("is-invalid");
        return false;
      }
    }
  }

  submit.click(function (e) {
    $.each(forms, function(i, elem) {
      checkInput(elem);
    });
    let valid = checkInput(mail) && checkInput(mdp);
    if (!valid) {
      e.preventDefault();
    }
  })


})
