var validar = 0;
$(function () {
        var divs = $(".steps").toArray().length;
        var q1 = divs - 1;
        var inicio = divs - q1;
        $("#numero_pg").show()
        for (let index = 1; index <= divs; index++) {
                $(".mid_step_" + index).hide();
                $(".mid_step_" + index).css("width", "70%");
        }
        $(".mid_step_" + inicio).show()
        cargar_provincia();
        $(".boton-derecho").attr("disabled", true)
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
                        validar++;
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
                        validar++;
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
                        $(".boton-derecho").attr("disabled", false)
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
        $("#numero_pg").val(a);
        $(".boton-derecho").attr("type", 'submit'); $(".boton-derecho").html("Enviar")
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
        var valida = validarcedula($("#cedula"));
        if (valida == 0) {
                alertify.error('Cedula no valida!!');
                $("#cedula").focus()
        } else {
                alertify.success('Cedula  valida!!');
                var variable = "dato=cedula&cedula=" + $(this).val();
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
                                        $(".boton-derecho").attr("disabled", false)
                                        dezplazars(3)

                                } else {
                                        $("#apellido").val("");
                                        $("#nombre").val("");
                                        $("#correo").val("");
                                        $("#telefono").val("");
                                        $("#direccion").val("")
                                        $("#usuario").val("")
                                        $("#passwords").val("")

                                        cargar_provincia();
                                        $("#canton").html("")
                                        $("#parroquia").html("")
                                        $("#nombre").focus();
                                        $("#apellido").removeAttr("readonly");
                                        $("#nombre").removeAttr("readonly");
                                        $("#telefono").removeAttr("readonly");
                                        $("#correo").removeAttr("readonly");
                                        $("#usuario").removeAttr("readonly");
                                        $("#passwords").removeAttr("readonly");
                                        $("#direccion").removeAttr("readonly");
                                }

                        }
                });
        }

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
        var total = $("#total_factura").val();
        var iva = $("#iva_factura").val();
        var sub = $("#subtotal").val()
        var html = ' <div class="row"><div class="col">Envio </div><div class="col">$2</div></div>';
        if (valor == "Casa") {
                var r = Number(total);
                $(".envio").html(html)
                $("#envio").val("2")
                r = r + 2;
                $("#total_factura").val(r);
                $(".total_vista").html(r);
        }
        else {
                var r2 = (Number(sub) + Number(iva));
                $(".envio").html("")
                $("#envio").val("0");
                $("#total_factura").val(r2);
                $(".total_vista").html(r2);
        }
});
function validarcedula(ced) {
        var i;
        var retorno = "";
        var cedula;
        var acumulado;
        cedula = ced.val();
        var instancia;
        acumulado = 0;
        for (i = 1; i <= 9; i++) {
                if (i % 2 != 0) {
                        instancia = cedula.substring(i - 1, i) * 2;
                        if (instancia > 9) instancia -= 9;
                } else instancia = cedula.substring(i - 1, i);
                acumulado += parseInt(instancia);
        }
        while (acumulado > 0) acumulado -= 10;

        if (cedula.substring(9, 10) != acumulado * -1) {
                retorno = 0;
        } else {
                retorno = 1;
        }
        return retorno;
}

/* $("#formulario_cliente").submit(function (e) {
        /* action="https://lab-mrtecks.com/app_php/vendedor_electronico/carrito/recibir.php"  
}); */

$(".boton-derecho[type=button]").click(function (e) {
    
        switch ($("#numero_pg").val()) {
                case "1":
                        if ($("#telefono").val() == "" || $("#nombre").val()=="" || $("#apellido").val()=="" || $("#correo").val()=="" || $("#direccion").val()=="" ) {
                                alertify.error("Datos vacios"); 
                        }else{
                                dezplazar(2) 
                        }
                        break;
        case "2":
                if ($("#usuario").val() == "" ||  $("#passwords").val()=="" ) {
                        alertify.error("Datos vacios"); 
                }else{
                        dezplazar(3) 
                }
                
        break;
        case "3": 
        if ($("#tipo_pago").val() == "" ||  $("#transporte").val()=="" ) {
                alertify.error("Datos vacios"); 
        }else{
                dezplazars(3) 
        }
        break;
             
        }
});

$(".boton-derecho[type=submit]").click(function (e) {
        alert("gg")

});