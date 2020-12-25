function tipo(opcion){
    localStorage.setItem("menu",opcion );
    var ubicacion_ruta=$(location).attr('pathname');
 if(ubicacion_ruta!="/"){
    
    Swal.fire({
        title: 'LAB-MRTECks te sugiere elegir de nuevo ',
        width: 600,
        padding: '3em',
        background: '#ffffff08 ',
        backdrop: `
          
          rgb(255 255 256 / 0.05)
          url("http://lab-mrtecks.com/assets/imagen/sweet.gif")
          center top
          no-repeat
        `,  showCancelButton: true,
        confirmButtonText: 'lo hare',
        cancelButtonText: 'No lo hare',
        reverseButtons: true
      
      }).then((result) => {
        if (result.value) {
       
          window.location.href="https://lab-mrtecks.com/"
          menu_hidden_contenido(localStorage.getItem("menu"));
        }else{
            
            menu_hidden_contenido(localStorage.getItem("menu"));
        }
      })
      //window.location.href="https://lab-mrtecks.com/"
 }
    else{  
        menu_hidden_contenido(localStorage.getItem("menu"));}
   
}
function exit() {
    window.location.href="https://lab-mrtecks.com/" 
}
function menu_hidden_contenido(params) {
    
    for (var i = 1; i <=10; i++) {

        $(".contenido"+i).hide();
    }
    $(".contenido"+params).show();
}

$(document).ready( function () {
 $(".pie_pagina").html('<footer class="footer mt-auto badge badge-dark  fixed-bottom"> <div class="container"><span class="text-white text-left ">AUTOR:BRYAN BONILLA</span></div></footer>')

} );

function archivo(archivo,tipo,titulo){
    var variable=archivo;
    var icono_descarga ='<svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-arrow-down-circle-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">'
   +'<path fill-rule="evenodd" d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8.5 5a.5.5 0 0 0-1 0v4.793L5.354 7.646a.5.5 0 1 0-.708.708l3 3a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 9.793V5z"/>'
  +'</svg>';
  var icono_codigo='<svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-file-earmark-code" fill="currentColor" xmlns="http://www.w3.org/2000/svg">'
  +'<path d="M4 1h5v1H4a1 1 0 0 0-1 1v10a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V6h1v7a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2z"/>'
  +'<path d="M9 4.5V1l5 5h-3.5A1.5 1.5 0 0 1 9 4.5z"/>'
 +' <path fill-rule="evenodd" d="M8.646 6.646a.5.5 0 0 1 .708 0l2 2a.5.5 0 0 1 0 .708l-2 2a.5.5 0 0 1-.708-.708L10.293 9 8.646 7.354a.5.5 0 0 1 0-.708zm-1.292 0a.5.5 0 0 0-.708 0l-2 2a.5.5 0 0 0 0 .708l2 2a.5.5 0 0 0 .708-.708L5.707 9l1.647-1.646a.5.5 0 0 0 0-.708z"/>'
+'</svg>';
if(tipo=="c"){
    $("#modal_ejecucion").modal("show");
    $(".titulo_modal").html(titulo);
    var  ruta ="https://lab-mrtecks.com/app_c/"+archivo;
    $(".contenido_ejecucion").html('<p>Para que  te  funcione  descarga zinjai o dev </p>'
    +'<a  href="https://lab-mrtecks.com/app_c/'+archivo+'.exe" download="demo_tarea9.exe">Demo'+icono_descarga+'</a><br>'
    +'<a  href="https://lab-mrtecks.com/app_c/'+archivo+'.cpp" download="Codigo_tarea9.cpp">Codigo'+icono_codigo+'</a> ');
   
}
if(tipo=="php"){
var array=["https://lab-mrtecks.com/app_php/instituto.gabriela.mistral/","https://lab-mrtecks.com/pilotostadgo/","https://lab-mrtecks.com/app_php/app_php_calculadora.php","https://lab-mrtecks.com/app_php/app_php_conexionesdbb.php","https://lab-mrtecks.com/app_php/app_php_editorial.php","https://lab-mrtecks.com/app_php/app_php_arqueologa/app_php_arqueologa.php"]
window.open(array[archivo]);
}

}



function destruir_session(){
 
 
 
$.ajax({
  type: "post",
  url: "https://lab-mrtecks.com/app_php/destrucion_session.php",
  data: "",

  success: function (response) {
     $("#resultado").val('');
     
     
 $('#usuario').val('');
    $('#contraseña').val('');
     $('#serve').val('');
    $('#bdd').val('');
   $('#puerto').val('');
     $("#resultado").hide();
  }
});

}

