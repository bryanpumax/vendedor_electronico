
 
	$("#buscar").click(function (e) { 
	
	var searchs=$("#searchs").val()
        var variable="dato=detalle&searchs="+searchs;
$.ajax({
        type: "GET",
        url: "http://localhost/vendedor_electronico/algoritmo/modelo.php",
        data: variable,
        success: function (response) {
        var datos=tabla(searchs,response)
                  $(".vista").html(datos)
        }
});
		
              
	});
function tabla(producto,params) {
        var fila="";
 var lista=(JSON.stringify(params));

        var tabla='<div class="table-responsive"><p class="fs-2 text-uppercase">'+producto+' </p><table class="table caption-top"> ';
tabla+='<thead><tr><th scope="col">Producto</th><th scope="col">Marca</th><th scope="col">Serie</th><th scope="col">Modelo</th><th scope="col">Imagen</th>'+
    '</tr></thead>';
 for(var i = 0; i < lista.length; i++){
		  
		 
		fila+='<tr><td>'+lista[i].nombre_producto+'</td><td></td><td></td></tr>';
	 
	}
        tabla+='</table></div>';
        return tabla;
}
  
