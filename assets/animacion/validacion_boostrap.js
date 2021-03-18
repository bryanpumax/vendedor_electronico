(function() {
    'use strict';
    window.addEventListener('load', function() {
      // Fetch all the forms we want to apply custom Bootstrap validation styles to
      var forms = document.getElementsByClassName('needs-validation');
      // Loop over them and prevent submission
      var validation = Array.prototype.filter.call(forms, function(form) {
        form.addEventListener('submit', function(event) {
          if (form.checkValidity() === false) {
            event.preventDefault();
            event.stopPropagation();
          }
          form.classList.add('was-validated');
        }, false);
      });
    }, false);
 
  })();

  function numeros(e) {
    tecla = document.all ? e.keyCode : e.which;
    if (tecla == 8) return true;
    patron = /\d/;
    te = String.fromCharCode(tecla);
    return patron.test(te);
  }
  function letranumero(e) {
    tecla = document.all ? e.keyCode : e.which;
    if (tecla == 8) return true;
    patron = /[A-Za-z\d\s\ñ\Ñ\u00E0-\u00FC]/;
    te = String.fromCharCode(tecla);
    
    return patron.test(te);
  }
  
  function letra(e) {
    tecla = document.all ? e.keyCode : e.which;
    if (tecla == 8) return true;
    patron = /[A-Za-z\s\ñ\Ñ\u00E0-\u00FC]/;
    te = String.fromCharCode(tecla);
    
    return patron.test(te);
  }

  function limitar(e, contenido, caracteres) {
    // obtenemos la tecla pulsada
    var unicode = e.keyCode ? e.keyCode : e.charCode;
  
    if (
      unicode == 8 ||
      unicode == 46 ||
      unicode == 13 ||
      unicode == 9 ||
      unicode == 37 ||
      unicode == 39 ||
      unicode == 38 ||
      unicode == 40
    )
      return true;
  
    // Si ha superado el limite de caracteres devolvemos false
    if (contenido.length >= caracteres) return false;
  
    return true;
  }