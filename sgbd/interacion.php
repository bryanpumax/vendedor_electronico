<?php 
 
function consultas($tabla,$campo,$texto_condicion)
{include "mysql.php";
$sentecia="SELECT $campo from $tabla $texto_condicion;";
 $sql = $pdo->query($sentecia);
return $sql;
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
return $sentecia;
}
function otras($texto_condicion)
{include "mysql.php";
$sentecia=$texto_condicion;
 $sql = $pdo->query($sentecia);
return $sql;
}