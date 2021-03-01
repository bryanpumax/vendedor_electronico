<?php
session_start();
include("modelo.php");
$dato=$_REQUEST["dato"];

switch ($dato) {
case 'btn_accion_modal':
switch ($_REQUEST["accion"]) {
        case '1':
                    echo cc($_REQUEST["facturacion"],$_REQUEST["baucher"]);
                break;
    
}
   
        break;
case 'borrar_facturas':
     echo borrar_facturas();
        break;
case 'descripcion_pago':
       echo descripcion_pago($_REQUEST["tp"]);
        break;
case 'detalle_producto_factura':
$id=$_REQUEST["id_facturacion"];
        echo detalle_producto_facturas($id);
        break;

case 'cedula':
        echo usuario_existente($_REQUEST["cedula"]);
        break;
case 'seguimiento':
        echo controlador_seguimiento();
        break;
case 'carga_datos_facturacion':
     echo carga_datos_facturacion();
        break;
 case 'provincia':
echo provincia();
                              break;
                               case 'canton':
echo canton($_REQUEST["provincia"]);
                              break;
                                  case 'parroquia':
echo parroquia($_REQUEST["provincia"],$_REQUEST["canton"]);
                              break;
        case 'carga':
                echo carga_producto( ) ;
                break;
                   case "comprar":

echo comprar();
                      break;
                     
  case 'updatedetalle':
  
  switch ($_REQUEST["accion"]) {
          case 'update':
          echo     accion_actualizar($_REQUEST["id_detalle"],$_REQUEST["id_imagens"],$_REQUEST["id_facturas"],$_REQUEST["cantidad"],$_REQUEST["precio"]);
                  break;
          
      case 'delete':
eliminar($_REQUEST["id_imagens"],$_REQUEST["id_facturas"]);         
echo carga_producto();
              break;
  }
   
  
 
}
function carga_producto( )
{
$id_factura=informacion_usuario_fact( );
 return detalle_factura($id_factura); 
}

function accion_actualizar($id_detalle,$id_imagens,$id_factura,$cantidad,$precio){
$total=accion_detalle_update($id_detalle,$id_imagens,$id_factura,$cantidad,$precio);
echo $total;
}
function eliminar($id_imagens,$id_factura)
{
 return      accion_eliminar($id_imagens,$id_factura);
}
 
 function comprar()
 {                  $página_inicio = file_get_contents('https://lab-mrtecks.com/app_php/vendedor_electronico/carrito/formulario.php');
 return $página_inicio;
 }

 function provincia()
 {
         echo '<option value="0">Seleccione provincia del ecuador</option>'.mod_provincia();         
 }
 function canton($provincia)
 {
                return mod_canton($provincia);
 }
  function parroquia($provincia,$canton)
 {
                return mod_parroquia($provincia,$canton);
 }
 function carga_datos_facturacion()
 {
  return md_carga_datos_facturacion();
 }
 function controlador_seguimiento()
 {
         return seguimiento();
 }
function usuario_existente( $cedula)
{  return usuario_existente_modelo($cedula);    }
function detalle_producto_facturas($ids)
{return detalle_producto_factura_modelo($ids);}
function descripcion_pago($tp)
{
        return descripcion_pagom($tp);
}

function borrar_facturas()
{
         return borrar_facturas_modelo();
}
function cc($id_factura,$baucher)
{
  echo actualizar("tbl_facturacion","documento='$baucher'","id_facturacion='$id_factura'");
}