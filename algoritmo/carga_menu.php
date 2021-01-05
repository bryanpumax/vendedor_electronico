<?php 
session_start();
include ("../sgbd/interacion.php");
$usuario="";
$login="";
$tabla="";
$campo_usuario="";
$text_factura="";
if (isset($_SESSION["usuario"])) {
   $usuario=isset($_SESSION["id_usuario"]);
   $login=1;
}else{
   $usuario=getenv('COMPUTERNAME');
   $login=0;
}

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
  $consulta2=$consulta->fetchAll(PDO::FETCH_ASSOC);
$id_factura=$consulta2[0]["$text_factura"];
$parametros="$login,$id_factura,'$usuario'";
   $funcion_cantidad_producto=otras("SELECT cantidad_productos($parametros) as cantidad");
      $funcion_cantidad_producto2=$funcion_cantidad_producto->fetchAll(PDO::FETCH_ASSOC);
   $cantidad=$funcion_cantidad_producto2[0]["cantidad"];  
echo  $cantidad;