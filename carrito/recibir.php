<?php
session_start();
include "../sgbd/interacion.php";
$cedula=$_POST["cedula"];
  $n2_factura=$_POST["n2_factura"];
  $id=$_REQUEST["id"];
  $iva=$_REQUEST["iva_factura"];
  $total_factura=$_REQUEST["total_factura"];
  $hora_factura=$_REQUEST["hora_factura"];
  $tipo_pago=$_REQUEST["tipo_pago"];
  

/* $_POST[""] */
 
  if (isset($_SESSION["usuario"])) {
   $usuario=isset($_SESSION["cedula"]);
   $login=1;
}else{
$user_agent = $_SERVER['HTTP_USER_AGENT']; 
$SO = getPlatform($user_agent);
   $usuario=$SO;
   $login=0;
     $tbl_cliente= existe_datos("tbl_clliente","where tbl_clliente.cedula_cliente='$cedula'");
  $tbl_usuario= existe_datos("tbl_usuario","where tbl_usuario.cedula_usuario='$cedula'");
  if ($tbl_cliente>=0 && $tbl_usuario>=0) {
   $valor=$login.",'".$cedula."','".$_POST["nombre"]."','".$_POST["apellido"]."','".$_POST["telefono"]."','".$_POST["correo"]."','".$_POST["parroquia"]."','".$_POST["Direccion"]."','".$_POST["usuario"]."','".$_POST["passwords"]."'";


      procedimiento("insertar_cliente",$valor);
      $sql=consultas("tbl_clliente","*","where cedula_cliente='$cedula'");
      $tbl_clientes=$sql->fetch();
      $id_cliente=$tbl_clientes["id_cliente"];
     $valor2="'$id','$n2_factura','$id_cliente','$iva','$total_factura','$hora_factura','$tipo_pago','Verificacion'";
     
      procedimiento("factura_eliminacion_tmp",$valor2);  
      $_SESSION["cedula"]=$cedula;
     
      echo '<script>alert("Ingresar seguimiento de la factura en el menu");
    window.location.href=("https://lab-mrtecks.com/app_php/vendedor_electronico/");
    </script>'; 
   
     
  }
}
 

    