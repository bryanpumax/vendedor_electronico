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
  if ($producto=="") {
      echo  json_encode("vacio");;
  }else{
  
     $sql=consultas("tbl_producto","*","where  nombre_producto LIKE '%$producto%'");
$row=$sql->fetchAll();
echo  json_encode($row);
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
      $sql=consultas("tbl_producto,tbl_imagen","*"," where tbl_producto.id_producto=tbl_imagen.id_producto");
$row=$sql->fetchAll();
echo  json_encode($row);
}

function detalle($producto)
{
        
}

