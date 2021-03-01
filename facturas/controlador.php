<?php
include("modelo.php");
 
$dato=$_REQUEST["dato"];
switch ($dato) {
  case 'archivo':
   var_dump($_REQUEST);
    break;
}
 

function formato_banco()
{
$html='<form action="https://lab-mrtecks.com/app_php/vendedor_electronico/facturas/excel.php"  enctype="multipart/form-data" method="post" id="formulario" name="formulario"  class="was-validated">
 
<div class="row">
 <div class="input-group mb-3">
  <div class="input-group-prepend">
    <label class="input-group-text" for="inputGroupSelect01">Selecciona el banco de registro</label>
  </div>
  <select class="custom-select" required name="banco" id="banco">'.option_bancos().'</select>
    <div class="invalid-feedback">
     Seleccione Banco
    </div>
</div>

</div>
<div class="row">
 <div class="input-group mb-3">
  <div class="custom-file col-1">
    <input type="file" class=" custom-file-input" id="input_excel" name="input_excel" accept=".csv, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel" required> 
  </div>
  <div class="input-group-append">
  <label class="input-group-text" for="input_excel" aria-describedby="inputGroupFileAddon02">Subir el archivo del historial de banco</label>
    <label class="input-group-text" id="texto"></label> 
     <a class="input-group-text btn btn-danger" onclick="eliminar()">Eliminar</a>
    <a class="input-group-text btn btn-secondary" onclick="formato()">Formato de excel</a>
  </div>
    <div class="invalid-feedback">
      Ingrese un archivo
    </div>
</div>
  
</div>
<div class="row botones"><input type="submit"  class="btn btn-primary"  value="Registrar"></div>
  
</form>
';
return $html;
}
?>

 