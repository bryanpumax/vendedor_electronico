<?php
include ("../sgbd/interacion.php");
function option_bancos()
{
$html="";
      $consulta= consultas("tbl_forma_pago","*","where tipo_pago!='Efectivo'") ;
              $html.='<option value="">Seleccione entidad financiera</option>'     ;
      while ($row=$consulta->fetch()) {
         $html.='<option value="'.$row["id_forma_pago"].'">'.$row["tipo_pago"].'</option>'     ;
      }
      return $html;
}