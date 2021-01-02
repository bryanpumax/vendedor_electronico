<?php
include("../head2.php");
function decry( $q ) {
  $cryptKey  = 'qJB0rGtIn5UB1xG03efyCp';
  $qDecoded      = rtrim( mcrypt_decrypt( MCRYPT_RIJNDAEL_256, md5( $cryptKey ), base64_decode( $q ), MCRYPT_MODE_CBC, md5( md5( $cryptKey ) ) ), "\0");
  return( $qDecoded );
}
$html="";
if(isset($_GET['dato'])){
  if($_GET['dato']=="mensaje"){
  $correoquien=($_GET['correoquien']);
  $nombrequien=decry($_GET['nombrequien']);
$ruta="docente";
$html.='
<form action="resultado.php" method="POST">
<div class="form-group">
    <label for="exampleFormControlInput1">Asunto</label>
    <input type="text" class="form-control" name="asunto" id="asunto" placeholder="Asunto">
    
  </div>
  <div class="form-group">
    <label for="exampleFormControlInput1">Email</label>
    <input type="email" class="form-control"  name="correoquien" id="correoquien" value="'.$correoquien.'">
  </div>
  <div class="form-group">
    <label for="exampleFormControlInput1">Nombre Apellido</label>
    <input type="text" class="form-control"   name="nombrequien" id="nombrequien" value="'.$nombrequien.'">
  </div>
  
  <div class="form-group">
    <label for="exampleFormControlTextarea1">Mensaje</label>
    <textarea class="form-control" name="mensaje" id="mensaje" cols="30" rows="5"></textarea>
  </div>
  <input type="hidden" name="ruta" id="ruta" value="'.$ruta.'">
  <input type="hidden" name="cedula" id="cedula" value="0">
  <input type="submit" value="Enviar" name="enviar" id="enviar" class="form-control btn btn-primary">
</form>';
echo $html;
}
else{
  $html.='<h2>Formulario olvido</h2>';
  $correoquien=null;
  $nombrequien=null;
$ruta="a";
$html.='
<form action="resultado.php" method="POST">
<div class="form-group">
    <label for="exampleFormControlInput1">Asunto</label>
    <input type="text" class="form-control" name="asunto" id="asunto" placeholder="Asunto">
    
  </div>
  <div class="form-group">
    <label for="exampleFormControlInput1">Cedula</label>
    <input type="text" class="form-control" name="cedula" id="cedula" placeholder="Cedula">
    
  </div>
  
 
  <div class="form-group">
    <label for="exampleFormControlInput1">Email</label>
    <input type="email" class="form-control"  name="correoquien" id="correoquien" value="'.$correoquien.'">
  </div>
  <div class="form-group">
    <label for="exampleFormControlInput1">Nombre Apellido</label>
    <input type="text" class="form-control"   name="nombrequien" id="nombrequien" value="'.$nombrequien.'">
  </div>
  
  <div class="form-group">
    <label for="exampleFormControlTextarea1">Mensaje</label>
    <textarea class="form-control" name="mensaje" id="mensaje" cols="30" rows="5"></textarea>
  </div>
  <input type="hidden" name="ruta" id="ruta" value="'.$ruta.'">
  <input type="submit" value="Enviar" name="enviar2" id="enviar2" class="form-control btn btn-primary">
</form>';
echo $html;
}

}
?>

<?php include("../script2.php");?>