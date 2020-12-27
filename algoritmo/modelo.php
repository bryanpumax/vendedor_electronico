<?php
include "../sgbd/interacion.php";
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
$urls=url();

$sql=consultas("tbl_producto","*","");
$row=$sql->fetchAll();
echo  json_encode($row);