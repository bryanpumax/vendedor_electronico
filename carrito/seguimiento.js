$(function () {
 
seguimiento()
});

function seguimiento() {
    $(".table").DataTable({
      
    "language": {
      "url": "//cdn.datatables.net/plug-ins/1.10.21/i18n/Spanish.json"
    }
  });
}
