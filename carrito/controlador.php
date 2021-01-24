<?php
session_start();
include("modelo.php");
$dato=$_REQUEST["dato"];

switch ($dato) {
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
 {                  $página_inicio = file_get_contents('http://localhost/vendedor_electronico/carrito/formulario.php');
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