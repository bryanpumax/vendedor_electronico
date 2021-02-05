$(function () {
  var variable = "dato=div-vista";
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