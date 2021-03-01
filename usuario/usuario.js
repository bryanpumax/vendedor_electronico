function login() { 
var variable="dato=login&usuario="+$("#usuario").val()+"&contrase="+$("#contrase").val();
$.ajax({
        type: "POST",
        url: "https://lab-mrtecks.com/app_php/vendedor_electronico/usuario/controlador.php",
        data: variable,
       
        success: function (response) {
$(".panel-derecho").html(response)
        }
});
 }

function registrar() { alert("registrar") }

function olvidar() { alert("olvidar") }
function relleno() {  
var variable="dato=vista";
$.ajax({
        type: "POST",
        url: "https://lab-mrtecks.com/app_php/vendedor_electronico/usuario/controlador.php",
        data: variable,
       
        success: function (response) {
$(".panel-derecho").html(response)
        }
});
}
