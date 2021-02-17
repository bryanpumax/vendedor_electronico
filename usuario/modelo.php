<?php
function verificacion($usuario,$contraseña)
{
$p=md5($contraseña);
        $sql=consultas("tbl_usuario","*","INNER JOIN tbl_clliente on tbl_clliente.cedula_cliente=tbl_usuario.cedula_usuario
        INNER JOIN tbl_parroquia on tbl_parroquia.id_parroquia=tbl_clliente.id_parroquia INNER JOIN tbl_canton on tbl_canton.id_canton=tbl_parroquia.id_canton INNER JOIN tbl_provincia on tbl_provincia.id_provincia =tbl_canton.id_provincia 
         where usuario_usuario='$usuario' and pasword_usuario='$p'");
         $con=$sql->rowcount();  
         if ($con>0) {
                 $row=$sql->fetch();
                 $_SESSION["cedula"]= $row["cedula_usuario"];
                 $_SESSION["id_cliente"]=$row["id_cliente"];
                 $_SESSION["usuario"]=$row["usuario_usuario"];
                 $_SESSION["rol_id"]=$row["rol_id"];
                 $_SESSION["nombre"]=$row["nombre_usuario"]." ".$row["apellido_usuario"];
                 $_SESSION["nombres"]=$row["nombre_usuario"];
                 $_SESSION["apellidos"]=$row["apellido_usuario"];
                     $_SESSION["pasword_usuario"]="*******";
                 $_SESSION["telefono_cliente"]=$row["telefono_cliente"];
                   $_SESSION["correo_cliente"]=$row["correo_cliente"];
                 $_SESSION["direccion_cliente"]=$row["direccion_cliente"];
                  $_SESSION["id_parroquia"]=$row["id_parroquia"];
                   $_SESSION["id_canton"]=$row["id_canton"];
                     $_SESSION["id_provincia"]=$row["id_provincia"];
                     $_SESSION["parroquia_parroquia"]=$row["parroquia_parroquia"];
                   $_SESSION["canton_canton"]=$row["canton_canton"];
                     $_SESSION["provincia_provincia"]=$row["provincia_provincia"];
   
    return 1;
         } else {
                 return 0;
         }
         
       
        //return $con;
}