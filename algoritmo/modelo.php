<?php
session_start();
include "../sgbd/interacion.php";
$dato=$_GET["dato"];
$urls=url();
 
switch ($dato) {
    case 'auto':
     return autocomplete($urls);
        break;
 case 'detalle':
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
     
     $html="";
while ($row=$sql->fetch()) {
$html.='<tr><td>'.$row["nombre_producto"].'</td>
<td>'.$row['marca_producto'].'</td>
<td>'.$row['serie_producto'].'</td>
<td>'.($row['precio_kardex']+1).'</td>
<td>'.imagens($row['id_producto'],$row["id_proveedor"],2).'</td><td><a onclick="color_proveedor_producto('.$row['id_detalle_kardex'].')" class="btn btn-success">Añadir</a></td></tr>';    
}
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
$cantidad_compra=detalle_carrito($id_factura,$id_imagen,$detalle,$_GET["login"]);
echo $cantidad_compra;
       break;

}
  function  url(){
    if(isset($_SERVER['HTTPS'])){
        $protocol = ($_SERVER['HTTPS'] && $_SERVER['HTTPS'] != "off") ? "https" : "http";
    }
    else{
        $protocol = 'http';
    }
    $host=$_SERVER['HTTP_HOST'];
    $directorio="/vendedor_electronico/";
    return $protocol . "://" .$host.$directorio  ;
}


function autocomplete($utl)
{
 

      $sql=consultas("tbl_producto,tbl_imagen,detalle_kardex","*"," where tbl_imagen.id_detalle_kardex=detalle_kardex.id_detalle_kardex and detalle_kardex.id_producto=tbl_producto.id_producto group by nombre_producto "); 
$row=$sql->fetchAll();
echo  json_encode($row);
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
  $html="";
  $html.="";
  $html.='<div class="card-deck">';
  $columna=1;
  $fila=1;
while ($row=$sql->fetch()) {
if($columna==1){
$html.='<div class="row">';
}

if (isset($_SESSION["usuario"])) {
   $usuario_temporal=isset($_SESSION["id_usuario"]);
   $login=1;
}else{
   $usuario_temporal=getenv('COMPUTERNAME');
   $login=0;
}

if ($fila<$limite) {

  $html.='<div onclick="seleccionar_color(\''.$usuario_temporal.'\',\''.$row["id_imagen"].'\','.$row["id_detalle_kardex"].','.$login.')" class="card text-center col-sm-4 " style="width: 20%;">';
}
if ($fila==$limite) {
  $html.='<div onclick="seleccionar_color(\''.$usuario_temporal.'\',\''.$row["id_imagen"].'\','.$row["id_detalle_kardex"].','.$login.')" class="card col-sm-5 " style="width: 20rem;">';
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
  $consulta= consultas("tmp_factura","*",'where fecha_factura=curdate() and usuario_tmp="'.$usuario.'" and 
DATE_FORMAT(hora_factura,"%H")>=01   and DATE_FORMAT(hora_factura,"%H")<=23'); 
$consulta2=$consulta->fetchAll(PDO::FETCH_ASSOC);
 if ($consulta->rowcount()==1) {
    procedimiento("factura",$valor);
 } else {
    procedimiento("factura",$valor);
 }
 


return $consulta2[0]["id_factura"];

 
}
function detalle_carrito($id_factura,$producto,$detalle,$login)
{

$consulta_producto= consultas("detalle_kardex","detalle_kardex.precio_kardex as precio,tbl_producto.nombre_producto,tbl_imagen.id_imagen ","INNER JOIN tbl_imagen on tbl_imagen.id_detalle_kardex=detalle_kardex.id_detalle_kardex 
INNER JOIN tbl_producto on tbl_producto.id_producto=detalle_kardex.id_producto
where tbl_imagen.id_imagen=$producto"); 
$consulta_producto2=$consulta_producto->fetchAll(PDO::FETCH_ASSOC);
$pvp=$consulta_producto2[0]["precio"]+1;
$valor="$login,$detalle,$producto,$id_factura,1,$pvp";
procedimiento("detalle_facturas",$valor);
$parametros="$login,$id_factura";
   $funcion_cantidad_producto=otras("SELECT cantidad_productos($parametros) as cantidad");
   $funcion_cantidad_producto2=$funcion_cantidad_producto->fetchAll(PDO::FETCH_ASSOC);
   $cantidad=$funcion_cantidad_producto2[0]["cantidad"];
return $cantidad;
} 
 
function generate_numbers($start, $count, $digits) {
 
   for ($n = $start; $n < $start + $count; $n++) {
      $result  = str_pad($n, $digits, "0", STR_PAD_LEFT);
   }
   return $result;
}

