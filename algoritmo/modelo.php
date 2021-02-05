<?php
session_start();
include "../sgbd/interacion.php";
$dato=$_GET["dato"];
 
 
switch ($dato) {
    case 'auto':
    
     return autocomplete();
        break;
 case 'detalle':
 if (isset($_SESSION["usuario"])) {
   $usuario_temporal=isset($_SESSION["cedula"]);
   $login=1;
}else{
$user_agent = $_SERVER['HTTP_USER_AGENT']; 
$SO = getPlatform($user_agent);
   $usuario_temporal=$SO;
   $login=0;
}
  $producto=$_GET["searchs"];
  $presupuesto=$_GET["presupuesto"];
  $sql=""; 
  if ($producto=="") {
      echo  json_encode("vacio");
  }else{
  if ($presupuesto=="") {
   $sql=consultas("tbl_producto,tbl_imagen,detalle_kardex","*","where tbl_imagen.id_detalle_kardex=detalle_kardex.id_detalle_kardex and detalle_kardex.id_producto=tbl_producto.id_producto and  nombre_producto LIKE '%$producto%' group by id_proveedor");
  }else {
    $sql=consultas("tbl_producto,tbl_imagen,detalle_kardex","*","where tbl_imagen.id_detalle_kardex=detalle_kardex.id_detalle_kardex and detalle_kardex.id_producto=tbl_producto.id_producto and  nombre_producto LIKE '%$producto%' and detalle_kardex.precio_kardex<=$presupuesto group by id_proveedor");
  }
      $html = '<div class="table-responsive"><table class="table caption-top table-bordered">
       <thead><tr><th >Producto</th>
      <th  class="">Marca</th>
      <th  class="">Serie</th>
      <th >Precio</th>
      <th  class="" >Imagen</th>
      <th >Accion</th></tr></thead>';
   
while ($row=$sql->fetch()) {
$html.='<tr><td>'.$row["nombre_producto"].'</td>
<td class="">'.$row['marca_producto'].'</td>
<td class="">'.$row['serie_producto'].'</td>
<td>'.($row['precio_kardex']+1).'</td>
<td class="col">'.imagens($row['id_producto'],$row["id_proveedor"],2).'</td><td><a onclick="color_proveedor_producto('.$row['id_detalle_kardex'].')" class="btn btn-success">Añadir</a></td></tr>';    
}
$html.= '</table></div>';
echo $html;

  }
     break;
     case 'modal':
     $detalle_kardex=$_GET["detalle_kardex"];
     $moda=modal_producto($detalle_kardex);
          $contador_imagen=contador_imagen($detalle_kardex);
      switch ($_GET['componente']) {
        case 'titulo':
        echo ($moda["nombre_producto"]);
          break;
        case 'cuerpo':
        
          echo imagens_modal($moda['id_producto'],$moda["id_proveedor"],$contador_imagen);
          break;
       
      }
       break;
     case 'carrito':
         
       $id_factura=factura($_GET["usuario"],$_GET["login"]);
$id_imagen=$_GET["id_imagen"];
$detalle=$_GET["detalle"]; 
if ($id_factura!="x") {
$cantidad_compra=detalle_carrito($id_factura,$id_imagen,$detalle,$_GET["login"],$_GET["usuario"]);
}else {
  $cantidad_compra="-";
}

echo $cantidad_compra;
 
       break;
case 'div-vista':
 echo div_contenido_vista();
  break;
}
 

function autocomplete()
{      $sql=consultas("tbl_producto,tbl_imagen,detalle_kardex","*"," where tbl_imagen.id_detalle_kardex=detalle_kardex.id_detalle_kardex and detalle_kardex.id_producto=tbl_producto.id_producto group by nombre_producto "); 
$row=$sql->fetchAll();
echo  json_encode($row);
}
 function div_contenido_vista()
 {
  if (isset($_SESSION["usuario"])) {
   $usuario_temporal=isset($_SESSION["cedula"]);
   $login=1;
}else{
$user_agent = $_SERVER['HTTP_USER_AGENT']; 
$SO = getPlatform($user_agent);
   $usuario_temporal=$SO;
   $login=0;
}
   factura($usuario_temporal,$login);
  
   $sql=consultas("tbl_producto,tbl_imagen,detalle_kardex","*","where tbl_imagen.id_detalle_kardex=detalle_kardex.id_detalle_kardex and detalle_kardex.id_producto=tbl_producto.id_producto  group by id_proveedor");
  
      $html = '<div class="table-responsive"><table class="table caption-top table-bordered">
       <thead><tr><th >Producto</th>
      <th  class="">Marca</th>
      <th  class="">Serie</th>
      <th >Precio</th>
      <th  class="" >Imagen</th>
      <th >Accion</th></tr></thead>';
   
while ($row=$sql->fetch()) {
$html.='<tr><td>'.$row["nombre_producto"].'</td>
<td class="">'.$row['marca_producto'].'</td>
<td class="">'.$row['serie_producto'].'</td>
<td>'.($row['precio_kardex']+1).'</td>
<td class="col">'.imagens($row['id_producto'],$row["id_proveedor"],2).'</td><td><a onclick="color_proveedor_producto('.$row['id_detalle_kardex'].')" class="btn btn-success">Añadir</a></td></tr>';    
}
$html.= '</table></div>';
echo $html;
 }

function imagens( $id_producto,$id_proveedor,$limite){
 
  $sql=consultas("tbl_imagen ,detalle_kardex","*","where tbl_imagen.id_detalle_kardex=detalle_kardex.id_detalle_kardex and detalle_kardex.id_producto=$id_producto and detalle_kardex.id_proveedor=$id_proveedor limit $limite");
  $html="";
while ($row=$sql->fetch()) {
  $html.='<img class="img-fluid " style="height: 100px;width: 100px;object-fit: fill;" src="'.$row['ruta'].'" alt="">';    
  
}
 
return $html;
}

function modal_producto($detalle_kardex)
{
     $sql=consultas("tbl_producto,tbl_imagen,detalle_kardex","*"," where tbl_imagen.id_detalle_kardex=detalle_kardex.id_detalle_kardex and detalle_kardex.id_producto=tbl_producto.id_producto and  detalle_kardex.id_detalle_kardex=$detalle_kardex"); 
$row=$sql->fetch();
return $row;
}


function contador_imagen($detalle_kardex)
{
     $sql=consultas("tbl_producto,tbl_imagen,detalle_kardex","*"," where tbl_imagen.id_detalle_kardex=detalle_kardex.id_detalle_kardex and detalle_kardex.id_producto=tbl_producto.id_producto and  detalle_kardex.id_detalle_kardex=$detalle_kardex"); 

return $sql->rowcount();
}


function imagens_modal( $id_producto,$id_proveedor,$limite){
 
  $sql=consultas("tbl_imagen ,detalle_kardex","*","where tbl_imagen.id_detalle_kardex=detalle_kardex.id_detalle_kardex and detalle_kardex.id_producto=$id_producto and detalle_kardex.id_proveedor=$id_proveedor limit $limite");
    if (isset($_SESSION["usuario"])) {
   $usuario_temporal=isset($_SESSION["cedula"]);
   $login=1;
}else{
$user_agent = $_SERVER['HTTP_USER_AGENT']; 
$SO=getPlatform($user_agent);
   $usuario_temporal=$SO;
   $login=0;
}
  $html="";
  $html.="";
  $html.='<div class="card-deck ">';
  $columna=1;
  $fila=1;

while ($row=$sql->fetch()) {
if($columna==1){
$html.='<div class="row">';
}


 
if ($fila<$limite) {

  $html.='<div onclick="seleccionar_color(\''.$usuario_temporal.'\',\''.$row["id_imagen"].'\','.$row["id_detalle_kardex"].','.$login.')" class="card text-center col-sm-4  "  >';
}
if ($fila==$limite) {
  $html.='<div onclick="seleccionar_color(\''.$usuario_temporal.'\',\''.$row["id_imagen"].'\','.$row["id_detalle_kardex"].','.$login.')" class="card col-sm-5 " >';
}
  $html.='
     <img class="card-img-top" style="height: 100px;width: 100px;object-fit: fill;"  src="'.$row['ruta'].'" alt="Card image cap">
    <div class="card-body">
      <h4 class="card-title  text-uppercase" id="prod'.$row["id_imagen"].'" name="prod'.$row["id_imagen"].'">'.$row["color"].'</h4>
    </div>
  </div> ';    
  if($columna==3){
$html.='</div>';
}
$columna++;
if($columna==4){
$columna=1;
}
$fila++;

}
 $html.='</div>';
return $html;
}

 

function factura($usuario,$login)
{
  $consulta_factura= consultas("tbl_facturacion","*",''); 
$n_factura=$consulta_factura->rowcount()+1;
$n2_factura=generate_numbers($n_factura,1,10);
$valor="$login,'$usuario','$n2_factura'";
if ($login==0) {
  $tabla="tmp_factura";
  $campo_usuario="usuario_tmp";
  $text_factura="id_factura";
}else {
  $tabla="tbl_facturacion";
  $campo_usuario="  id_cliente ";
  $text_factura="id_facturacion";
}

  $consulta= consultas("$tabla","*",'where fecha_factura=curdate() and '.$campo_usuario.'="'.$usuario.'" and 
DATE_FORMAT(hora_factura,"%H")>=01   and DATE_FORMAT(hora_factura,"%H")<=23'); 

  if ($consulta->rowcount()==0) {
    procedimiento("factura",$valor);
    return "x";
 }  else {
   $consulta2=$consulta->fetchAll(PDO::FETCH_ASSOC);
    return $consulta2[0]["$text_factura"];
 }


 
}
function detalle_carrito($id_factura,$producto,$detalle,$login,$usuario)
{

$consulta_producto= consultas("detalle_kardex","detalle_kardex.precio_kardex as precio,tbl_producto.nombre_producto,tbl_imagen.id_imagen ","INNER JOIN tbl_imagen on tbl_imagen.id_detalle_kardex=detalle_kardex.id_detalle_kardex 
INNER JOIN tbl_producto on tbl_producto.id_producto=detalle_kardex.id_producto
where tbl_imagen.id_imagen=$producto"); 
$consulta_producto2=$consulta_producto->fetchAll(PDO::FETCH_ASSOC);
$pvp=$consulta_producto2[0]["precio"]+1;
$valor="$login,$detalle,$producto,$id_factura,1,$pvp";
  procedimiento("detalle_facturas",$valor);
$parametros="$login,$id_factura,'$usuario'";
   $funcion_cantidad_producto=otras("SELECT cantidad_productos($parametros) as cantidad");
   $funcion_cantidad_producto2=$funcion_cantidad_producto->fetchAll(PDO::FETCH_ASSOC);
   $cantidad=$funcion_cantidad_producto2[0]["cantidad"];
return $cantidad;
} 
 

