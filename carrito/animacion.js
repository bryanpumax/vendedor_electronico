$(function () {
        alert("tabla con datable")
        
});
var valor_constante=1;
  var resultado;
  var  total;
  function input_cantidad(input_id) {
  var cantidad=$(".cantidads_"+input_id).val();
        if (cantidad==0) {
          resultado=1;      
        }  
         $(".cantidads_"+input_id).val(resultado);      
  }
function menos(input_id) {
  var cantidad=$(".cantidads_"+input_id).val();
  var precio=$(".precio_"+input_id).html(); 
  if (cantidad>2) {
  resultado=cantidad-valor_constante ;        
  } else {
          resultado=1;
  }
  total=resultado*precio;
  $(".cantidads_"+input_id).val(resultado);
  $(".total_"+input_id).html(total)
}
function mas(input_id) {

var cantidad=$(".cantidads_"+input_id).val(); 
var precio=$(".precio_"+input_id).html(); 

var resultado=cantidad;    
  resultado++;  
  total=resultado*precio;
  $(".cantidads_"+input_id).val(resultado);   
$(".total_"+input_id).html(total)
}
