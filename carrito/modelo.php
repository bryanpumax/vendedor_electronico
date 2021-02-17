
<?php 
include ("../sgbd/interacion.php");
function detalle_factura($id_factura)
{
$nombre="";
/* SELECT * FROM `tmp_detalle` where id_factura=63 */
if (isset($_SESSION["cedula"])) {
   $usuario=isset($_SESSION["id_cliente"]);
   $login=1;
    $nombre=$_SESSION["nombre"];
}else{
$user_agent = $_SERVER['HTTP_USER_AGENT']; 
$SO = getPlatform($user_agent);
   $usuario=$SO;
   $login=0;
   $nombre="";
}
if ($login==0) {
  $tabla="tmp_detalle";
  $campo="id_factura";
    $id_detalle="id_detalle";
    $campo_cantidad="cantidad";
  
}else {
  $tabla="detalle_factura";
  $campo="id_facturacion";
  $id_detalle="id_detalle_factura";
  $campo_cantidad="cantidad_cliente";
}

  
  
  if ($id_factura=="x") {
 
    $html='<script>alert("Error no existe factura");
    window.location.href=("https://lab-mrtecks.com/app_php/vendedor_electronico/");
    </script>';
    
  }else{
  $suma=0;
  $html=' 
<table class="table">
     <thead><tr ><td class="" >Producto</td>
     <td>Cantidad</td>
     <td>Precio</td>
     <td>Total</td>
     <td>Accion</td></tr></thead>
        <tbody class="fila_detalle" >';
  $consulta= consultas("$tabla","*","INNER JOIN tbl_imagen on tbl_imagen.id_imagen=$tabla.id_imagen INNER JOIN detalle_kardex on detalle_kardex.id_detalle_kardex=$tabla.id_detalle_kardex INNER JOIN tbl_producto on tbl_producto.id_producto=detalle_kardex.id_producto where $tabla.$campo=$id_factura"); 
  while ($row=$consulta->fetch()) {
    $html.='  <tr>
<td >
<div class="row">
<div class=""><img style="height: 100px;width: 100px;object-fit: fill;"
 src="'.$row["ruta"].'" alt="'.$row["nombre_producto"].' '.$row["color"].'"> </div>

                        <div class="offset-md-2 datos_informacion text-center">
                        <div class="row">'.$row["nombre_producto"].'</div>
                        <div class="row">'.$row["marca_producto"].'</div>
                        <div class="row">'.$row["color"].'</div>
                        <div class="row">'.$row["serie_producto"].'</div>
                        </div></div>
                        </td>
                        <td><div class="input-group">

  <div class="input-group-append" id="button-addon4">
    <button class="btn btn-outline-danger" onclick="menos('.$row[$id_detalle].','.$row["id_imagen"].','.$id_factura.')" type="button">-</button>
      <input type="text" class="form-control text-center cantidads_'.$row[$id_detalle].'" value="'.$row[$campo_cantidad].'" onchange="input_cantidad('.$row[$id_detalle].','.$row["id_imagen"].','.$id_factura.')">
    <button class="btn btn-outline-primary" onclick="mas('.$row[$id_detalle].','.$row["id_imagen"].','.$id_factura.')" type="button">+</button>
  </div>
</div>

</td>
<td>
<div class="precios text-center"><div class="row">Precio unitario</div>
<div class="row ">$ <div class="precio_'.$row[$id_detalle].'">'.$row["precio_unitario_cliente"].'</div></div></div>

</td>
<td><div class="total_precio text-center">
<div class="row">Total</div>
<div class="row">$ <div class=" total_'.$row[$id_detalle].'">'.$row["precio_total_cliente"].'</div> </div>
</div></td>
<td><button class="btn btn-danger" onclick="eliminar('.$row[$id_detalle].','.$row["id_imagen"].','.$id_factura.')">Eliminar</button></td>
                </tr>';
 
  }
  $html.='  
        </tbody>
</table>
 

';
  }
  
  return $html;
}

function informacion_usuario_fact ()
{$usuario="";
$login="";
$tabla="";
$campo_usuario="";
$text_factura="";
if (isset($_SESSION["cedula"])) {
   $usuario=($_SESSION["id_cliente"]);
   $login=1;
}else{
$user_agent = $_SERVER['HTTP_USER_AGENT']; 
$SO = getPlatform($user_agent);
   $usuario=$SO;
   $login=0;
}

if ($login==0) {
  $tabla="tmp_factura";
  $campo_usuario="usuario_tmp";
  $text_factura="id_factura";
}else {
  $tabla="tbl_facturacion";
  $campo_usuario="estado_facturacion='Nueva' and   id_cliente ";
  $text_factura="id_facturacion";
}
  $consulta= consultas("$tabla","*",'where fecha_factura=curdate() and '.$campo_usuario.'="'.$usuario.'" and 
DATE_FORMAT(hora_factura,"%H")>=01   and DATE_FORMAT(hora_factura,"%H")<=23');    
    $consulta2=$consulta->fetchAll(PDO::FETCH_ASSOC);
  if ($consulta->rowcount()>0) {
$id_factura=$consulta2[0]["$text_factura"];
$mensaje=$id_factura;
  } else {
          $mensaje="x";
  }  
return $mensaje;
}

function accion_detalle_update($detalle,$producto,$id_factura,$cantidad,$pvp)
{
$usuario="";
$login="";
$tabla="";
$campo_usuario="";
$text_factura="";
 if (isset($_SESSION["cedula"])) {
   $usuario=isset($_SESSION["id_cliente"]);
   $login=1;
}else{
$user_agent = $_SERVER['HTTP_USER_AGENT']; 
$SO = getPlatform($user_agent);
   $usuario=$SO;
   $login=0;
}
  $valor="$login,$detalle,$producto,$id_factura,$cantidad,$pvp";
procedimiento("detalle_facturas",$valor);
if ($login==0) {
  $tabla="tmp_detalle";
  $campo="id_factura";
    $id_detalle="id_detalle";
  
}else {
  $tabla="detalle_factura";
  $campo="id_facturacion";
  $id_detalle="id_detalle_factura";
}
$html="";
  $consulta= consultas("$tabla","precio_total_cliente","INNER JOIN tbl_imagen on tbl_imagen.id_imagen=$tabla.id_imagen INNER JOIN detalle_kardex on detalle_kardex.id_detalle_kardex=$tabla.id_detalle_kardex INNER JOIN tbl_producto on tbl_producto.id_producto=detalle_kardex.id_producto where $tabla.$campo=$id_factura and tbl_imagen.id_imagen=$producto"); 
    $consulta2=$consulta->fetchAll(PDO::FETCH_ASSOC);

$total=$consulta2[0]["precio_total_cliente"];
return $total;
}
function accion_eliminar($producto,$id_factura)
{
$usuario="";
$login="";
$tabla="";
$campo_usuario="";
$text_factura="";
 if (isset($_SESSION["cedula"])) {
   $usuario=isset($_SESSION["id_cliente"]);
   $login=1;
}else{
$user_agent = $_SERVER['HTTP_USER_AGENT']; 
$SO = getPlatform($user_agent);
   $usuario=$SO;
   $login=0;
} 
  

if ($login==0) {
  $tabla="tmp_detalle";
  $campo="id_factura";
    $id_detalle="id_detalle";
  $cantidad="cantidad";
}else {
  $tabla="detalle_factura";
  $campo="id_facturacion";
  $id_detalle="id_detalle_factura";
    $cantidad="cantidad_cliente";
}
 
 
$campo_valor="$campo=$id_factura and id_imagen=$producto";
  delete($tabla,$campo_valor);
  $consu=consultas($tabla,"sum($cantidad*precio_unitario_cliente) as  total_facturas"," where $campo=$id_factura");
  $row=$consu->fetch();
  $suma=$row["total_facturas"];
  update("tbl_facturacion","iva_factura=($suma*0.12),total_factura=($suma+($suma*0.12))"," id_facturacion=$id_factura");
   
 
}

function mod_provincia()
{
  $consulta=consultas("tbl_provincia","*","");
  $html="";
  while ($row=$consulta->fetch()) {
    $html.=' <option value="'.$row["id_provincia"].'">'.$row["provincia_provincia"].'</option>';
  } 
  return $html;
}
function mod_canton($provincia)
{
  $consulta=consultas("tbl_canton","*","INNER JOIN tbl_provincia on tbl_provincia.id_provincia=tbl_canton.id_provincia
WHERE tbl_canton.id_provincia=$provincia");
  
  $html="";$html1="";
  while ($row=$consulta->fetch()) {
    $html.=' <option value="'.$row["id_canton"].'">'.$row["canton_canton"].'</option>';
    $html1='<option value="0">Seleccione un canton de la provincia '.$row["provincia_provincia"].'</option>';
  } 
  return $html1.$html;
  
}
function mod_parroquia($provincia,$canton)
{
  $consulta=consultas("tbl_canton","*","INNER JOIN tbl_provincia on tbl_provincia.id_provincia=tbl_canton.id_provincia
  INNER JOIN tbl_parroquia on tbl_parroquia.id_canton=tbl_canton.id_canton
WHERE tbl_canton.id_provincia=$provincia and tbl_parroquia.id_canton=$canton ");
  
  $html="";$html1="";
  while ($row=$consulta->fetch()) {
    $html.=' <option value="'.$row["id_parroquia"].'">'.$row["parroquia_parroquia"].'</option>';
    $html1='<option value="0">Seleccione una parroquia del canton '.$row["canton_canton"].'</option>';
  } 
  return $html1.$html;
}

function md_carga_datos_facturacion()
{
 $usuario="";
$login="";
$tabla="";
$campo_usuario="";
$text_factura="";
if (isset($_SESSION["cedula"])) {
   $usuario=($_SESSION["id_cliente"]);
   $login=1;
}else{
$user_agent = $_SERVER['HTTP_USER_AGENT']; 
$SO = getPlatform($user_agent);
   $usuario=$SO;
   $login=0;
}

if ($login==0) {
  $tabla="tmp_factura";
  $campo_usuario="usuario_tmp";
  $text_factura="id_factura";
  $tabla2="tmp_detalle";
  
}else {
  $tabla="tbl_facturacion";
  $campo_usuario="estado_facturacion='Nueva' and  id_cliente ";
  $text_factura="id_facturacion";
  $tabla2="detalle_factura";
 
}
if (!isset($_SESSION["cedula"])) {
 $id_cliente="";
$cedula= ""; 
                $usuarioss="" ;  
               $nombre=  "";
                 $apellido="";
                 $passwords="";
                 $telefono="";
                 $correo="";
                 $direccion="";
                       $id_parroquia="";
                 $id_canton="";
                 $id_provincia="";
                 $parroquia_parroquia="";
                 $canton_canton="";
                 $provincia_provincia="";
}else{

   $id_cliente=($_SESSION["id_cliente"]);
$cedula=$_SESSION["cedula"]; 
                $usuarioss=$_SESSION["usuario"] ;  
               $nombre=$_SESSION["nombres"] ;
                 $apellido=$_SESSION["apellidos"];
$passwords=  $_SESSION["pasword_usuario"];
   $telefono= $_SESSION["telefono_cliente"] ;
            $correo=       $_SESSION["correo_cliente"] ;
                 $direccion=$_SESSION["direccion_cliente"] ;
                 $id_parroquia=$_SESSION["id_parroquia"];
$id_canton=$_SESSION["id_canton"];
$id_provincia=$_SESSION["id_provincia"];
$parroquia=$_SESSION["parroquia_parroquia"];
$canton=$_SESSION["canton_canton"];
$provincia=$_SESSION["provincia_provincia"];
  $htmlparroquia='<option value=\''.$id_parroquia.'\'>'.$parroquia.'</option>';
  $htmlcanton='<option value=\''.$id_canton.'\'>'.$canton.'</option>';
  $htmlprovincia='<option value=\''.$id_provincia.'\'>'.$provincia.'</option>';
echo '<script>$("#cedula").val("'.$cedula.'");
 $("#nombre").val("'.$nombre.'");
                $("#apellido").val("'.$apellido.'");    
                $("#nombre").attr("readonly",true);   
                $("#apellido").attr("readonly",true); 
                $("#telefono").val("'.$telefono.'");
                $("#correo").val("'.$correo.'");
                $("#direccion").val("'.$direccion.'");
                $("#usuario").val("'.$usuarioss.'");
                $("#passwords").val("'.$passwords.'");
                    $("#provincia").html("'.$htmlprovincia.'")
                $("#canton").html("'.$htmlcanton.'")
                $("#parroquia").html("'.$htmlparroquia.'")
</script>';
}

  $consulta= consultas("$tabla","*"," INNER JOIN $tabla2 on $tabla2.$text_factura=$tabla.$text_factura where fecha_factura=curdate() and $campo_usuario='$usuario' and DATE_FORMAT(hora_factura,'%H')>=01   and DATE_FORMAT(hora_factura,'%H')<=23");   
    $consultaop= consultas("$tabla","*"," INNER JOIN $tabla2 on $tabla2.$text_factura=$tabla.$text_factura where fecha_factura=curdate() and $campo_usuario='$usuario' and DATE_FORMAT(hora_factura,'%H')>=01   and DATE_FORMAT(hora_factura,'%H')<=23");   
    
  $consulta_factura= consultas("tbl_facturacion","*",' ORDER BY tbl_facturacion.n_factura DESC LIMIT 1'); 
  $consulta_facturas=$consulta_factura->fetch();
$n_factura=(intval($consulta_facturas["n_factura"]))+1;
$n2_factura=generate_numbers($n_factura,1,10);
   $consulta2=$consulta->fetchAll(PDO::FETCH_ASSOC);
  
    $id_factura=$consulta2[0]["$text_factura"];  
    $suma=0;
    $hora="";
    $id="";
    while ($row=$consultaop->fetch()) {
  $suma=$row["precio_total_cliente"]+$suma; 
  $hora=$row["hora_factura"];
  $id=$row[$text_factura];
    }
    $iva=$suma*0.12;
    $total=$iva+$suma;
    $valor="iva_factura=$iva,total_factura=$total";
    update($tabla,$valor,"$text_factura=$id_factura");
  $html=' <h5 class="card-title">Factura '.$n2_factura.' <input type="hidden" value="'.$n2_factura.'" name="n2_factura" id="n2_factura">
  <input type="hidden" name="id" id="id" value="'.$id.'">
  </h5>
                                                        <p class="card-text">
                                                        <div class="row">
                                                                <div class="col">SubTotal</div>
                                                                <div class="col">$ '.$suma.'
                                                                </div>
                                                        </div>

                                                        <div class="row">
                                                                <div class="col">Iva 12%</div>
                                                                <div class="col">$'.$iva.' 
                                                                <input type="hidden"  value="'.$iva.'" name="iva_factura" id="iva_factura">
                                                                </div>
                                                        </div>

                                                        <div class="row">
                                                                <div class="col">Total</div>
                                                                <div class="col">$'.$total.'
                                                                <input type="hidden" value="'.$total.'" name="total_factura" id="total_factura">
                                                                 <input type="hidden"  value="0" name="descuento_factura" id="descuento_factura">
                                                                 <input type="hidden"  value="'.$hora.'" name="hora_factura" id="hora_factura">
                                                                </div>
                                                        </div>
                                                        </p>';
return $html;
}
function usuario_existente_modelo($cedula)
{
  $consulta= consultas("tbl_clliente","*","INNER JOIN tbl_usuario on tbl_usuario.cedula_usuario=tbl_clliente.cedula_cliente INNER JOIN tbl_parroquia on tbl_parroquia.id_parroquia=tbl_clliente.id_parroquia INNER JOIN tbl_canton on tbl_canton.id_canton=tbl_parroquia.id_canton INNER JOIN tbl_provincia on tbl_provincia.id_provincia =tbl_canton.id_provincia    where cedula_cliente='$cedula' ");   
  /* */
  $con=$consulta->rowcount();
  if ($con>0) {
  $consulta2=$consulta->fetchAll(PDO::FETCH_ASSOC);
  $nombre=$consulta2[0]["nombre_cliente"];  
  $apellido_cliente=$consulta2[0]["apellido_cliente"];  
  $telefono_cliente=$consulta2[0]["telefono_cliente"];  
  $correo_cliente=$consulta2[0]["correo_cliente"];  
  $direccion_cliente=$consulta2[0]["direccion_cliente"];  
  $nombre=$consulta2[0]["nombre_cliente"];  
  $usuario=$consulta2[0]["usuario_usuario"];
  $id_parroquia=$consulta2[0]["id_parroquia"];
  $id_canton=$consulta2[0]["id_canton"];
  $id_provincia=$consulta2[0]["id_provincia"];
  $parroquia=$consulta2[0]["parroquia_parroquia"];
  $canton=$consulta2[0]["canton_canton"];
  $provincia=$consulta2[0]["provincia_provincia"];
  $htmlparroquia='<option value="'.$id_parroquia.'">'.$parroquia.'</option>';
  $htmlcanton='<option value="'.$id_canton.'">'.$canton.'</option>';
  $htmlprovincia='<option value="'.$id_provincia.'">'.$provincia.'</option>';
 
  return json_encode(array("contador"=>1,'nombre' => $nombre,"apellido"=>$apellido_cliente,"telefono"=>$telefono_cliente,"correo"=>$correo_cliente,"direccion"=>$direccion_cliente,"usuario"=>$usuario,"password"=>"*******","provincia"=>$htmlprovincia,"canton"=>$htmlcanton,"parroquia"=>$htmlparroquia));
  } else {
    return json_encode(array("contador"=>0));
  }
  

}
function seguimiento( )
{
  $usuario="";
$login="";
$tabla="";
$campo_usuario="";
$text_factura="";
if (isset($_SESSION["cedula"])) {
   $usuario=($_SESSION["id_cliente"]);
   $login=1;
}else{
$user_agent = $_SERVER['HTTP_USER_AGENT']; 
$SO = getPlatform($user_agent);
   $usuario=$SO;
   $login=0;
}
if ($login==1)  {
  $tabla="tbl_facturacion";
  $campo_usuario=" id_cliente";
  $text_factura="id_facturacion";
  $tabla2="detalle_factura";
 
}
 
                 

  $consulta= consultas("$tabla","*","  where   $campo_usuario='$usuario' and DATE_FORMAT(hora_factura,'%H')>=01   and DATE_FORMAT(hora_factura,'%H')<=23");   
$html='<table class="table">
        <thead>
                <tr>
                        <th>N factura</th>
                        <th>Fecha hora</th>
                        <th>Valor</th>
                        <th>Estado</th>
                        <th>Accion</th>
                </tr>
        </thead> <tbody >';
while ($row=$consulta->fetch()) { 
  $html.='  <tr>
                        <td scope="row">'.$row["n_factura"].'</td>
                        <td>'.$row["fecha_factura"].' '.$row["hora_factura"].'</td>
                        <td>$'.$row["total_factura"].'</td>
                        <td>'.$row["estado_facturacion"].'</td>
                        <td><button type="button" name="" id="" class="btn btn-primary ">Detalle-'.$row["id_cliente"].'</button>
<button type="button" name="" id="" class="btn btn-primary ">Pagar</button></td>
                </tr>';
}
$html.='  </tbody>
</table>';
return $html;

}
