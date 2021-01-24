
$(function() {
        var divs = $(".steps").toArray().length;
        var q1 = divs - 1;
        var inicio = divs - q1;
              $("#numero_pg").hide()
        for (let index = 1; index <= divs; index++) {
                $(".mid_step_" + index).hide();
                $(".mid_step_" + index).css("width","70%");
                

        }
        $(".mid_step_" + inicio).show()
cargar_provincia();
       
});

function menos_steps() {
  
        var pagina = $("#numero_pg").val();
        $(".mid_step_" + pagina).hide()
        $(".top_step_" + pagina).addClass("disabled")

        let r = pagina - 1;
        if (r>0) {
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
 if (pagina<=divs) {
     
        $(".mid_step_" + pagina).show()
        $("#numero_pg").val(pagina);
        $(".top_step_" + pagina).removeClass("disabled");      
 }     else{
        $(".boton-derecho").attr("type",'submit');
 } 
        if (divs==pagina) {
                  $(".boton-derecho").html("Enviar")
                
         }         
}
function cargar_provincia() {
  var variable = "dato=provincia"
        $.ajax({
                type: "POST",
                url: "http://localhost/vendedor_electronico/carrito/controlador.php",
                data: variable, 
                success: function (response) {
                        $("#provincia").html(response)
                       carga_datos_facturacion(); 
                }
        });
}
 
$("#provincia").change(function (e) { 
  var variable = "dato=canton&provincia="+$(this).val()
  $.ajax({
                type: "POST",
                url: "http://localhost/vendedor_electronico/carrito/controlador.php",
                data: variable, 
                success: function (response) {
                        $("#canton").html(response)
                        
                }
        });     
});

$("#canton").change(function (e) { 
  var variable = "dato=parroquia&canton="+$(this).val()+"&provincia="+$("#provincia").val()
  $.ajax({
                type: "POST",
                url: "http://localhost/vendedor_electronico/carrito/controlador.php",
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
                $(".mid_step_" + index).css("width","70%");
                

        }
        $(".mid_step_" + a).show()
         $("#numero_pg").val(a);
}

function carga_datos_facturacion() {
    var variable = "dato=carga_datos_facturacion"
   $.ajax({
           type: "POST",
         url: "http://localhost/vendedor_electronico/carrito/controlador.php",
                data: variable, 
           success: function (response) {
                $(".contenido-factura") .html(response)        
           }
   });
}