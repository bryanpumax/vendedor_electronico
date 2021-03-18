$(function () {
  relleno();
});
function relleno() {
  let variable = "dato=seguimiento"
  $.ajax({
    type: "POST",
    url: "https://lab-mrtecks.com/app_php/vendedor_electronico/carrito/controlador.php",
    data: variable,
    success: function (response) {
      $(".rellenar").html(response); 
      seguimiento();
    }
  });
}
function seguimiento() {
  $("#cliente").DataTable({
    "order": [[1, "desc"]],
    responsive: true,
    "language": {
      "url": "//cdn.datatables.net/plug-ins/1.10.21/i18n/Spanish.json"
    }
  });
  $(".superior").DataTable({
   dom: 'Bfrtip',buttons: [
      {
        text: 'Borrar/Actualizar facturas',
        action: function (e, dt, node, config) {
          var variable = "dato=borrar_facturas"
          $.ajax({
            type: "POST",
            url: "https://lab-mrtecks.com/app_php/vendedor_electronico/carrito/controlador.php",
            data: variable,

            success: function (response) {
              relleno();
              console.log(response)

            }
          });
        }
      },{
        text: 'Imprimir factura actuales',
        action: function (e, dt, node, config) { alert("hoy")}
      }
    ]
  ,
    "order": [[1, "desc"]],
    responsive: true,
    "language": {
      "url": "//cdn.datatables.net/plug-ins/1.10.21/i18n/Spanish.json"
    }
  });
}


function detalle_producto_factura(id_facturacion) {
  $('#modal_producto').modal('show')
  $("#exampleModalLabel").html("NºFacturacion:" + id_facturacion)
  var variable = "dato=detalle_producto_factura&id_facturacion=" + id_facturacion;
  /* titulo */
  $.ajax({
    type: "POST",
    url: "https://lab-mrtecks.com/app_php/vendedor_electronico/carrito/controlador.php",

    data: variable,
    success: function (response) {
      $(".cuerpo").html(response);

      $("#tb_detalle_producto_factura_modelo").DataTable({

        responsive: true,
        "language": {
          "url": "//cdn.datatables.net/plug-ins/1.10.21/i18n/Spanish.json"
        }
      });

    }
  });

}

function comprobante_casa(n,facturacion, banco) { 
  $('#modal_producto').modal('show')
  $("#exampleModalLabel").html("Ingrese el baucher de su factura " + n)
  var variable=' <div class="input-group flex-nowrap">'+
  '<div class="input-group-prepend">'+
    '<span class="input-group-text" id="addon-wrapping">Baucher del '+banco+'</span>'+
 ' </div><input type="hidden" value="" name="facturacion" id="facturacion"><input type="text" class="form-control"  name="baucher" id="baucher" placeholder="">'+  ' </div> <br><button onclick="btn_accion_modal('+facturacion+',1)" class="btn btn-secondary form-control" type="button" id="button-addon2">Guardar</button>';
   $(".cuerpo").html(variable);
}

function imprimir_factura_casa(facturacion,nfact) {
  var variable="dato=btn_accion_modal&facturacion="+facturacion+"&accion=3&nfact="+nfact;
 
  $.ajax({
    type: "POST",
    url: "https://lab-mrtecks.com/app_php/vendedor_electronico/carrito/controlador.php",

    data: variable,
    success: function (response) {    
      alert(response)
    }
  });
}

function comprobante_local(n,facturacion, banco) {
  $('#modal_producto').modal('show')
  $("#exampleModalLabel").html("Ingrese el baucher de su factura " + n)
  var variable=' <div class="input-group flex-nowrap">'+
  '<div class="input-group-prepend">'+
    '<span class="input-group-text" id="addon-wrapping">Baucher del '+banco+'</span>'+
 ' </div><input type="hidden" value="" name="facturacion" id="facturacion"><input type="text" class="form-control"  name="baucher" id="baucher" placeholder="">'+  ' </div> <br><button onclick="btn_accion_modal('+facturacion+',1)" class="btn btn-secondary form-control" type="button" id="button-addon2">Guardar</button>';
   $(".cuerpo").html(variable);
}
function imprimir_factura_local(facturacion,nfact) {
  var variable="dato=btn_accion_modal&facturacion="+facturacion+"&accion=2&nfact="+nfact;
 
  $.ajax({
    type: "POST",
    url: "https://lab-mrtecks.com/app_php/vendedor_electronico/carrito/controlador.php",

    data: variable,
    success: function (response) {    
      alert(response)
    }
  });
}
function btn_accion_modal(id_facturacion,accion) { 
var baucher="";
if ($("#baucher").length) {
  baucher="&baucher="+$("#baucher").val();
} else {
  baucher="";
}
var variable="dato=btn_accion_modal"+baucher+"&facturacion="+id_facturacion+"&accion="+accion;
 
  $.ajax({
    type: "POST",
    url: "https://lab-mrtecks.com/app_php/vendedor_electronico/carrito/controlador.php",

    data: variable,
    success: function (response) {    
      alert(response)
    }
  });
 location.reload();
 

 }
   