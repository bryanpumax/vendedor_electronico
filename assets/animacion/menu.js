function contenido(params) {
var ruta=localStorage.getItem("ruta");
        var urls =ruta+params;
    
        $.ajax({
                type: "PoST",
                url: urls,
                data: "data:nada",
                
                success: function (response) {
                $(".panel-derecho").html(response)
                }
        });
}