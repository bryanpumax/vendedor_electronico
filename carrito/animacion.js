$(function () {
  cargar_producto();

});
var valor_constante = 1;
var resultado;
var total;
function input_cantidad(id_detalle,id_imagens,id_facturas) {
  var cantidad = $(".cantidads_" + id_detalle).val();
  var precio = $(".precio_" + id_detalle).html();
  if (cantidad < 1) {
    resultado = 1;
  } else {
    resultado = cantidad;
  }
  total = resultado * precio;
  
  $(".cantidads_" + id_detalle).val(resultado);

 
  accion_tabla_detalle_factura("update",id_detalle,id_imagens,id_facturas,resultado,precio);
}
function menos(id_detalle,id_imagens,id_facturas) {
  var cantidad = $(".cantidads_" + id_detalle).val();
  var precio = $(".precio_" + id_detalle).html();
  if (cantidad > 2) {
    resultado = cantidad - valor_constante;
  } else {
    resultado = 1;
  }
  total = resultado * precio;
  $(".cantidads_" + id_detalle).val(resultado); 
  
  accion_tabla_detalle_factura("update",id_detalle,id_imagens,id_facturas,resultado,precio);
}
function mas(id_detalle,id_imagens,id_facturas) {

  var cantidad = $(".cantidads_" + id_detalle).val();
  var precio = $(".precio_" + id_detalle).html();

  var resultado = cantidad;
  resultado++;
  total = resultado * precio;
    accion_tabla_detalle_factura("update",id_detalle,id_imagens,id_facturas,resultado,precio);
  $(".cantidads_" + id_detalle).val(resultado); 
  

}

function cargar_producto() {
  var variable = "dato=carga"
  $.ajax({
    type: "POST",
    url: "http://localhost/vendedor_electronico/carrito/controlador.php",
    data: variable,

    success: function (response) {
      $(".accion").html(response)
      existe_tablas();  
   
    }
  });

}

function existe_tablas() {
  $(".table").DataTable({
    dom: 'Bfrtip',
    "language": {
      "url": "//cdn.datatables.net/plug-ins/1.10.21/i18n/Spanish.json"
    }, buttons: [
      {
        text: 'Comprar',
        action: function (e, dt, node, config) {
          var variable = "dato=comprar"
          $.ajax({
            type: "POST",
            url: "http://localhost/vendedor_electronico/carrito/controlador.php",
            data: variable,

            success: function (response) {
              $(".accion").html("")
            $(".accion").html(response)
            }
          });
        }
      }
    ]
  });
}

function eliminar(id_detalle,id_imagens,id_facturas) {
  accion_tabla_detalle_factura("delete",id_detalle,id_imagens,id_facturas,0,0);
}


function accion_tabla_detalle_factura(accion, id_detalle,id_imagens,id_facturas,cantidad,precio) {
  var variable = "dato=updatedetalle&accion="+accion+"&id_detalle="+id_detalle+"&id_imagens="+id_imagens+"&id_facturas="+id_facturas+"&cantidad=" + cantidad + "&precio=" + precio ;

  $.ajax({
    type: "POST",
    url: "http://localhost/vendedor_electronico/carrito/controlador.php",
    data: variable,

    success: function (response) {
    if (accion=="update") {
$(".total_" + id_detalle).html(response);       
    }else{
$(".accion").html("")
         $(".accion").html(response)
        existe_tablas();
        cargar_factura()
    }

    }
  });
}

