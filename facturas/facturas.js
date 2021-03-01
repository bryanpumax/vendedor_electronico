$("#input_excel").change(function (e) { 
      $("#texto").html($(this).val())
                if ($(this).val()=="") {
       $(".botones").hide()    
    } else {
          $(".botones").show() 
    }
});

$("#banco").change(function (e) { 
$("#input_excel").focus();
    if ($(this).val()==0) {
       $(".botones").hide()    
    }  
});
function formato() {
  $('#modal_producto').modal('show') 
      $("#exampleModalLabel").html("Modelo del "+$("#banco option:selected").text())
      $(".cuerpo").html("");
  } 
  $(function () {
       $(".botones").hide() 
  });
  function upload_excel() {
  if ($("#input_excel").val() =="") {
      return false; 
  }else{
  return true;
  }
  } 
  function eliminar() { 
   $("#texto").html("")
   $("#input_excel").val("")
          $(".botones").hide()    
   }