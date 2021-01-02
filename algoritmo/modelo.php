<?php
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
      echo  json_encode("vacio");;
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
   $usuario_temporal=getenv('COMPUTERNAME');
if ($fila<$limite) {

  $html.='<div onclick="seleccionar_color(\''.$usuario_temporal.'\',\''.$row["id_imagen"].'\','.$row["id_detalle_kardex"].')" class="card text-center col-sm-4 " style="width: 20%;">';
}
if ($fila==$limite) {
  $html.='<div onclick="seleccionar_color(\''.$usuario_temporal.'\',\''.$row["id_imagen"].'\','.$row["id_detalle_kardex"].')" class="card col-sm-5 " style="width: 20rem;">';
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


