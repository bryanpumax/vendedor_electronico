

$("#buscar").click(function (e) {

    var searchs = $("#searchs").val()
    var presupuesto = $("#presupuesto").val()
    var variable = "dato=detalle&searchs=" + searchs + "&presupuesto=" + presupuesto;
    $.ajax({
        type: "GET",
        url: "https://lab-mrtecks.com/app_php/vendedor_electronico/algoritmo/modelo.php",
        data: variable,
        success: function (response) {

          

            $(".vista").html(response)
          existe_tabla();
        }
    });


});

function existe_tabla() {
    $(".table").DataTable({
     responsive: true,
        "language": {
            "url": "//cdn.datatables.net/plug-ins/1.10.21/i18n/Spanish.json"
        },
        buttons: [
            {
                extend: 'pdf',
                text: 'Save current page',
                exportOptions: {
                    modifier: {
                        page: 'current'
                    }
                }
            }
        ]
    });
}
/* modal_producto  se  encuentra  en index */
function color_proveedor_producto(id_detalle_kardex) {
  var variable = "dato=modal&detalle_kardex=" + id_detalle_kardex+"&componente=titulo";
    $('#modal_producto').modal('show')
    /* titulo */
    $.ajax({
        type: "GET",
        url: "https://lab-mrtecks.com/app_php/vendedor_electronico/algoritmo/modelo.php",

        data: variable, 
        success: function (response) {
            $("#exampleModalLabel").html(response)
        }
    });
/* body */
var variable = "dato=modal&detalle_kardex=" + id_detalle_kardex+"&componente=cuerpo";
$.ajax({
        type: "GET",
        url: "https://lab-mrtecks.com/app_php/vendedor_electronico/algoritmo/modelo.php",

        data: variable, 
        success: function (response) {
            $(".cuerpo").html(response)
            
        }
    });
}

var click=0;
function seleccionar_color(usuario,id_imagen,detalle_kardex,login) {
    
    $("#prod"+id_imagen).addClass("text-primary")
    var variable="dato=carrito&usuario="+usuario+"&id_imagen="+id_imagen+"&detalle="+detalle_kardex+"&login="+login;
    $.ajax({
        type: "GET",
     url: "https://lab-mrtecks.com/app_php/vendedor_electronico/algoritmo/modelo.php",
        data: variable, 
        success: function (response) {
            $(".cantidad_producto").html(response)
           
        }
    });
}

$(function () {
    cargar_factura();
 
});
function cargar_factura() {

  var variable="dato=nada";
    
     $.ajax({

        type: "POST",  data: variable,
        url: "https://lab-mrtecks.com/app_php/vendedor_electronico/algoritmo/carga_menu.php",
        
        
        success: function (response) {
              $(".cantidad_producto").html(response)
         
        }
    }); 
}
