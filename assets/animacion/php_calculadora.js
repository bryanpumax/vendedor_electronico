var operandoa;
var operandob;
var operacion;



function eliminar() {
    $("#display").val("");
    $(".teclado .btn-outline-primary").attr("disabled", false);
    desahabilitar_button(false)
}
$("#numero0").click(function () { $("#display").val($("#display").val() + "0"); });
$("#numero1").click(function (e) { $("#display").val($("#display").val() + "1"); })
$("#numero2").click(function (e) { $("#display").val($("#display").val() + "2"); });
$("#numero3").click(function (e) { $("#display").val($("#display").val() + "3"); })
$("#numero4").click(function (e) { $("#display").val($("#display").val() + "4"); })
$("#numero5").click(function (e) { $("#display").val($("#display").val() + "5"); })
$("#numero6").click(function (e) { $("#display").val($("#display").val() + "6"); })
$("#numero7").click(function (e) { $("#display").val($("#display").val() + "7"); })
$("#numero8").click(function (e) { $("#display").val($("#display").val() + "8"); })
$("#numero9").click(function (e) { $("#display").val($("#display").val() + "9"); })
function desahabilitar_button(estado) {
  $("#numerop").attr("disabled", estado);
  $("#numerom").attr("disabled", estado);
  $("#numeromm").attr("disabled", estado);
  $("#numerod").attr("disabled", estado);
}
$("#numerop").click(function (e) {
    operandoa = $("#display").val();
    operacion = "+";
    desahabilitar_button(true);
    limpiar();
})
$("#numerom").click(function (e) {
  operandoa = $("#display").val();
  operacion = "-"
  desahabilitar_button();
  limpiar();
})
$("#numeromm").click(function (e) {
  operandoa = $("#display").val();
  operacion = "*"
  desahabilitar_button(true);
  limpiar();
})
$("#numerod").click(function (e) {
  operandoa = $("#display").val();
  operacion = "/"
  desahabilitar_button(true);
  limpiar();
})
$("#numeroi").click(function (e) {
    operandob = $("#display").val();
    
    resolver();
})
function limpiar() {
    $("#display").val("");
}
function resolver(){
    var res = 0;
    switch(operacion){
      case "+":
        res = parseFloat(operandoa) + parseFloat(operandob);
        break;
      case "-":
          res = parseFloat(operandoa) - parseFloat(operandob);
          break;
      case "*":
        res = parseFloat(operandoa) * parseFloat(operandob);
        break;
      case "/":
        res = parseFloat(operandoa) / parseFloat(operandob);
        break;
    }
  
    $("#display").val(operandoa+operacion+operandob+"="+res);
    $(".teclado .btn-outline-primary").attr("disabled", true);
  }
  function resetear(){
    $("#display").val("");
    operandoa = 0;
    operandob = 0;
    operacion = "";
  }
  $(document).ready( function () {
    $("#display").attr("readonly",true);
} );
