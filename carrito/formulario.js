
$(function () {
        var divs = $(".steps").toArray().length;
        var q1 = divs - 1;
        var inicio = divs - q1;
        $("#numero_pg").hide()
        for (let index = 1; index <= divs; index++) {
                $(".mid_step_" + index).hide();
                $(".mid_step_" + index).css("width", "70%");


        }
        $(".mid_step_" + inicio).show()
        cargar_provincia();

});

function menos_steps() {

        var pagina = $("#numero_pg").val();
        $(".mid_step_" + pagina).hide()
        $(".top_step_" + pagina).addClass("disabled")

        let r = pagina - 1;
        if (r > 0) {
                $(".mid_step_" + r).show()
                $("#numero_pg").val(r);
                $(".top_step_" + r).removeClass("disabled")
                $(".boton-derecho").html("Siguiente")
        }


}


function mas_steps() {
        var divs = $(".steps").toArray().length;
        var pagina = $("#numero_pg").val();


        $(".mid_step_" + pagina).hide()
        $(".top_step_" + pagina).addClass("disabled")
        pagina++;
        if (pagina <= divs) {

                $(".mid_step_" + pagina).show()
                $("#numero_pg").val(pagina);
                $(".top_step_" + pagina).removeClass("disabled");
        } else {
                $(".boton-derecho").attr("type", 'submit');
        }
        if (divs == pagina) {
                $(".boton-derecho").html("Enviar")

        }
}
function cargar_provincia() {
        var variable = "dato=provincia"
        $.ajax({
                type: "POST",
                url: "https://lab-mrtecks.com/app_php/vendedor_electronico/carrito/controlador.php",
                data: variable,
                success: function (response) {
                        $("#provincia").html(response)
                        carga_datos_facturacion();
                }
        });
}

$("#provincia").change(function (e) {
        var variable = "dato=canton&provincia=" + $(this).val()
        $.ajax({
                type: "POST",
                url: "https://lab-mrtecks.com/app_php/vendedor_electronico/carrito/controlador.php",
                data: variable,
                success: function (response) {
                        $("#canton").html(response)

                }
        });
});

$("#canton").change(function (e) {
        var variable = "dato=parroquia&canton=" + $(this).val() + "&provincia=" + $("#provincia").val()
        $.ajax({
                type: "POST",
                url: "https://lab-mrtecks.com/app_php/vendedor_electronico/carrito/controlador.php",
                data: variable,
                success: function (response) {
                        $("#parroquia").html(response)
                }
        });
});
function dezplazar(a) {
        var divs = $(".steps").toArray().length;
        var q1 = divs - 1;
        var inicio = divs - q1;
        for (let index = 1; index <= divs; index++) {
                $(".mid_step_" + index).hide();
                $(".mid_step_" + index).css("width", "70%");


        }
        $(".mid_step_" + a).show()
        $("#numero_pg").val(a);
}
function dezplazars(a) {
        var divs = $(".steps").toArray().length;
        var q1 = divs - 1;
        var inicio = divs - q1;
        for (let index = 1; index <= a; index++) {
                $(".mid_step_" + index).hide();
                $(".mid_step_" + index).css("width", "70%");


        }
        $(".mid_step_" + a).show()
        $("#numero_pg").val(a); $(".boton-derecho").attr("type", 'submit'); $(".boton-derecho").html("Enviar")
}
function carga_datos_facturacion() {
        var variable = "dato=carga_datos_facturacion"
        $.ajax({
                type: "POST",
                url: "https://lab-mrtecks.com/app_php/vendedor_electronico/carrito/controlador.php",
                data: variable,
                success: function (response) {
                        $(".contenido-factura").html(response)
                }
        });
}

$("#cedula").change(function (e) {
        var variable = "dato=cedula&cedula=" + $(this).val()
        $.ajax({
                type: "POST",
                url: "https://lab-mrtecks.com/app_php/vendedor_electronico/carrito/controlador.php",
                data: variable,
                success: function (response) {
                        var jsonData = JSON.parse(response);

                        if (jsonData.contador > 0) {
                                $("#nombre").val(jsonData.nombre)
                                $("#apellido").val(jsonData.apellido)
                                $("#nombre").attr("readonly", true);
                                $("#apellido").attr("readonly", true);
                                $("#telefono").val(jsonData.telefono);
                                $("#correo").val(jsonData.correo);
                                $("#direccion").val(jsonData.direccion);
                                $("#usuario").val(jsonData.usuario);
                                $("#passwords").val(jsonData.password);
                                $("#provincia").html(jsonData.provincia)
                                $("#canton").html(jsonData.canton)
                                $("#parroquia").html(jsonData.parroquia)
                                dezplazars(3)

                        } else {
                                $("#apellido").val("");
                                $("#nombre").val("");
                                $("#nombre").val("");
                                $("#telefono").val("");
                                $("#apellido").removeAttr("readonly");
                                $("#nombre").removeAttr("readonly");
                                cargar_provincia();
                                $("#canton").html("")
                                $("#parroquia").html("")
                        }

                }
        });
});
$("#tipo_pago").change(function () {
        var tp = $(this).val();
        var variable = "dato=descripcion_pago&tp=" + tp
        $.ajax({
                type: "POST",
                url: "https://lab-mrtecks.com/app_php/vendedor_electronico/carrito/controlador.php",
                data: variable,
                success: function (response) {
                        $(".contenido-pago").html(response);
                }
        });
});
$("#transporte").change(function (e) {
        var valor = $(this).val();
var total=$("#total_factura").val();
var iva=$("#iva_factura").val();
var sub=$("#subtotal").val()

  
  var html=' <div class="row"><div class="col">Envio </div><div class="col">$2</div></div>';
      if (valor=="Casa") {
        var r=Number(total);
              $(".envio").html(html)
              $("#envio").val("2")
            r=r+2;
$("#total_factura").val(r);
$(".total_vista").html(r);

      }
      
      else{
        var r2=(Number(sub)+Number(iva));
       $(".envio").html("")
              $("#envio").val("0");
              $("#total_factura").val(r2);
$(".total_vista").html(r2);}
});