$(function () {

relleno();


});
function relleno() {
  let variable="dato=seguimiento"
  $.ajax({
  type: "POST",
  url: "https://lab-mrtecks.com/app_php/vendedor_electronico/carrito/controlador.php",
  data: variable, 
  success: function (response) {
    $(".rellenar").html(response);seguimiento();
  }
}); 
}
function seguimiento() {
    $(".table").DataTable({
      
    "language": {
      "url": "//cdn.datatables.net/plug-ins/1.10.21/i18n/Spanish.json"
    }
  });
}
