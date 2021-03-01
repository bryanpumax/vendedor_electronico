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

function cerrarmodal() {
    $('#modal_producto').modal('hide')

}
function cerrarmenu() {
    $('body').removeClass('nav-open g-sidenav-show g-sidenav-pinned');
    $('body').addClass('g-sidenav-hidden');
  }