function contenido(params) {
var ruta=localStorage.getItem("ruta");
        var urls =ruta+params;
        console.log(urls)
        $.ajax({
                type: "PoST",
                url: urls,
                data: "data:nada",
                
                success: function (response) {
                $(".panel-derecho").html(response)
                }
        });
}