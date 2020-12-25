function comprar(titulo, precio, fecha_actual, fecha_final) {

        var variable = "titulo=" + titulo + "&precio=" +
                precio + "&fecha_actual=" + fecha_actual + "&fecha_final=" + fecha_final + "&dato=formulario";
        var url = "https://lab-mrtecks.com/app_php/lab-empresas/tramite.php";
        $.ajax({
                type: "post",
                url: url,
                data: variable,
                dataType: 'html',

                success: function (response) {
                        $(".informacion").html(response);


                }
        });
}


var paso = 1;
var variable;
function accion(valor) {
        paso = valor + paso

        if (paso <= 5) {

                switch (paso) {
                        case 1:
                                $(".seccion1").show();
                                $(".seccion2").hide();
                                $(".seccion3").hide();
                                $(".seccion4").hide();
                                $('.step1').html(cantidad_circulo(1))
                                $("#nextBtn").show();
                                $("#comprobar").hide();
                                $("#comprobar2").hide();
                                $("#nextBtn").html("Siguiente");
                                break;
                        case 2:
                                $(".seccion1").hide();
                                $(".seccion2").show();
                                $(".seccion3").hide();
                                $(".seccion4").hide();
                                $('.step1').html(cantidad_circulo(2))
                                $("#nextBtn").hide();
                                $("#comprobar").show();
                                $("#comprobar2").hide();
                                $("#nextBtn").html("Siguiente");
                                break;
                        case 3:

                                $(".seccion1").hide();
                                $(".seccion2").hide();
                                $(".seccion3").show();
                                $(".seccion4").hide();
                                $('.step1').html(cantidad_circulo(3))
                                $("#nextBtn").hide();
                                $("#comprobar").hide();
                                $("#comprobar2").show();
                                $("#nextBtn").html("Siguiente");
                                break;
                        case 4:
                                $("#comprobar").hide();
                                $("#comprobar2").hide();
                                $(".seccion2").hide();
                                $(".seccion1").hide();
                                $(".seccion3").hide();
                                $(".seccion4").show();
                                $(".seccion5").hide();
                                $("#nextBtn").html("Siguiente");
                                $('.step1').html(cantidad_circulo(4))
                                break;
                        case 5:
                                $("#comprobar2").hide();
                                $("#comprobar").hide();
                                $(".seccion2").hide();
                                $(".seccion1").hide();
                                $(".seccion3").hide();
                                $(".seccion4").hide();
                                $(".seccion5").show();
                                $('.step1').html(cantidad_circulo(5))
                                break;
                        default:

                                break;
                }
        } else {
                paso = 0;
        }

}
function check_seccion1() {
        var cont = 0;
        if ($("#nombre").val() != '') {
                cont++;
                $("#apellido").focus()
        }
        if ($("#apellido").val() != '') {
                cont++;
                $("#telefono").focus()
        }
        if ($("#telefono").val() != '') {
                cont++;
                $("#usuario").focus()
        }
        if ($("#usuario").val() != '') {
                if (correo($("#usuario").val()) == false) {
                        cont--; $("#usuario").focus()
                } else {
                        cont++; $("#password").focus()
                }
        }
        if ($("#password").val() != '') {
                cont++;
                $("#comprobar").focus()
        }

        if ($("#password").val() == '') {

                $("#password").focus()
        }
        if ($("#usuario").val() == '') {
                $("#usuario").focus()
        }


        if ($("#telefono").val() == '') {

                $("#telefono").focus()
        }
        if ($("#apellido").val() == '') {

                $("#apellido").focus()
        }
        if ($("#nombre").val() == '') {

                $("#nombre").focus()
        }
        if (cont == 5) {
                $("#nextBtn").show();
                $("#comprobar").hide();
                cont = 0;
        }

}

function cantidad_circulo(valor) {
        var icono_circulo = "";

        for (var i = 1; i <= valor; i = i + 1) {
                icono_circulo = '<i class="fas fa-circle"></i>' + icono_circulo;
        } return icono_circulo;
}

function numero(e) {
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
function correo(e) {
        var email = e;
        var formato = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
        var v_email = formato.test(email);
        if (v_email != true || email == "") {

                return false;
        }

        return true;
}



function check_seccion2() {
        var cont = 0;
        if ($("#nombre_empresa").val() != '') {
                cont++;
                $("#dedicacion_empresa").focus()
        }
        if ($("#dedicacion_empresa").val() != '') {
                cont++;
                $("#logo_empresa").focus()
        }
        if ($("#logo_empresa").val() != '') {
                cont++;
                $("#usuario").focus()
        }
        if ($("#logo_empresa").val() == '') {

                $("#logo_empresa").focus()
        }
        if ($("#dedicacion_empresa").val() == '') {

                $("#dedicacion_empresa").focus()
        }
        if ($("#nombre_empresa").val() == '') {

                $("#nombre_empresa").focus()
        }
        if (cont == 3) {
                $("#nextBtn").show();
                $("#comprobar2").hide();
                cont = 0;
        }
}

function check_seccion3() {
        var cont = 0;
        if ($("#nombre_empresa").val() != '') {
                cont++;
                $("#dedicacion_empresa").focus()
        }
        if ($("#dedicacion_empresa").val() != '') {
                cont++;
                $("#logo_empresa").focus()
        }
        if ($("#logo_empresa").val() != '') {
                cont++;
                $("#usuario").focus()
        }
        if ($("#logo_empresa").val() == '') {

                $("#logo_empresa").focus()
        }
        if ($("#dedicacion_empresa").val() == '') {

                $("#dedicacion_empresa").focus()
        }
        if ($("#nombre_empresa").val() == '') {

                $("#nombre_empresa").focus()
        }
        if (cont == 3) {
                $("#nextBtn").show();
                $("#comprobar2").hide();
                cont = 0;
        }
}

