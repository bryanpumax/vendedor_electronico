 <div class="input-group mb-3">
         <button id="buscar" name="buscar" class="btn btn-primary"><i class="fas fa-search"></i> </button>
         <input class="form-control col-12" name="searchs" type="text" id="searchs" aria-describedby="helpId">
 </div>

 <script>
/* $(function () {
	$.ajax({
		type: "method",
		url: "url",
		data: "data",
		dataType: "dataType",
		success: function (response) {
			
		}
	});
}); */
var options = {
        url: "algoritmo/modelo.php",

        getValue: "nombre_producto",

        template: {
                type: "description",
                fields: {
                        description: "marca_producto"
                }
        },

        list: {
                match: {
                        enabled: true
                }
        },

        theme: "plate-dark"
};

$("#searchs").easyAutocomplete(options);
$(function () {
	$("#buscar").click(function (e) { 
	
	var searchs=$("#searchs").val()
		alert(searchs)
		var variable="";
	});
});
 </script>