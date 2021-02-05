<?php 
 
function consultas($tabla,$campo,$texto_condicion)
{include "mysql.php";
$sentecia="SELECT $campo from $tabla $texto_condicion;";
 $sql = $pdo->query($sentecia);
return $sql;
}
function consultas_prueba($tabla,$campo,$texto_condicion)
{include "mysql.php";
$sentecia="SELECT $campo from $tabla $texto_condicion;";
 $sql = $pdo->query($sentecia);
return $sentecia;
}
function insertar($tabla,$campo,$texto)
{include "mysql.php";
        
$sentecia= "INSERT into $tabla ($campo) values ($texto)";
 $sql = $pdo->query($sentecia);
return $sql;
}
function update($tabla,$campo_valor,$texto)
{include "mysql.php";
    $sentecia= "UPDATE $tabla SET $campo_valor where $texto";
 
 $sql = $pdo->query($sentecia);
return $sql;
}
function delete($tabla,$campo_valor)
{include "mysql.php";
       $sentecia=  "DELETE FROM $tabla where $campo_valor";

 $sql = $pdo->query($sentecia);
return $sql;
}
function procedimiento($procedimiento,$valor)
{include "mysql.php";
//valor debes enviarle  con una  cadena  de texto
        $sentecia= "Call $procedimiento($valor);"; 
 $sql = $pdo->query($sentecia);
return $sql;
}
function otras($texto_condicion)
{include "mysql.php";
$sentecia=$texto_condicion;
 $sql = $pdo->query($sentecia);
return $sql;
}
/* funciones que pasa en todos lados */
function generate_numbers($start, $count, $digits) {
 
   for ($n = $start; $n < $start + $count; $n++) {
      $result  = str_pad($n, $digits, "0", STR_PAD_LEFT);
   }
   return $result;
}
//codigo de plataforma
function getPlatform($user_agent) {
$ip=$_SERVER["REMOTE_ADDR"];
   $plataformas = array(
      'Windows 10' => 'Windows NT 10.0+',
      'Windows 8.1' => 'Windows NT 6.3+',
      'Windows 8' => 'Windows NT 6.2+',
      'Windows 7' => 'Windows NT 6.1+',
      'Windows Vista' => 'Windows NT 6.0+',
      'Windows XP' => 'Windows NT 5.1+',
      'Windows 2003' => 'Windows NT 5.2+',
      'Windows' => 'Windows otros',
      'iPhone' => 'iPhone',
      'iPad' => 'iPad',
      'Mac OS X' => '(Mac OS X+)|(CFNetwork+)',
      'Mac otros' => 'Macintosh',
      'Android' => 'Android',
      'BlackBerry' => 'BlackBerry',
      'Linux' => 'Linux',
   );
   foreach($plataformas as $plataforma=>$pattern){
      if (preg_match('/(?i)'.$pattern.'/', $user_agent))
         return $plataforma."-".$ip;
   }
   return 'Otras'."-".$ip;
}

function existe_datos($tabla,$valor)
{
   $sql=consultas($tabla,"*",$valor);
  $co=$sql->rowcount();
 $bool="";
 if ($co>=1) {
    $bool=1;
 }else {
$bool= 0;
 }
return $bool; 

}