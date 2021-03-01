<?php

include "../sgbd/interacion.php";
include "modelo.php";
session_start();
$dato=$_REQUEST["dato"];
 switch ($dato) {
         case 'login':
                 # code...
               echo  login($_REQUEST["usuario"],$_REQUEST["contrase"]);
                 break;
         
case 'vista':
echo vista();
  break;
 }
 function login($usuario,$contrase)
 {

  $valor= verificacion($usuario,$contrase);   
if ($valor==0) {
   echo "usuario no existe";
     $página_inicio = file_get_contents($_SERVER["DOCUMENT_ROOT"].'/app_php/vendedor_electronico/usuario/login.php');
echo $página_inicio;  
} else {
 
           echo '<script> 
    window.location.href=("https://lab-mrtecks.com/app_php/vendedor_electronico/");
    </script>';
        
}

 } 
 function vista()
 { 
 return  'registro vendedores,tabla de todos los usuarios registrado ';
 }