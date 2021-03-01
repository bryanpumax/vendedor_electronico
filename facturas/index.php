<?php
session_start();
include "controlador.php" ;
$id_rol=$_SESSION["rol_id"]; 
if ($id_rol>8) {

echo formato_banco();   
}

echo '<script src="https://lab-mrtecks.com/app_php/vendedor_electronico/facturas/facturas.js"></script>';