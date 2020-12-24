<?php 
include "mysql.php";
echo consultas("gg","*","where gt=1");
function consultas($tabla,$campo,$texto_condicion)
{

        return "SELECT $campo from $tabla $texto_condicion;";
}
function insertar($tabla,$campo,$texto)
{
        return "INSERT into $tabla ($campo) values ($texto)";

}
function update($tabla,$campo_valor,$texto)
{
        return "UPDATE $tabla SET $campo_valor where $texto";

}
function delete($tabla,$campo_valor)
{
        return "DELETE FROM $tabla where $campo_valor";

}
function procedimiento($procedimiento,$valor)
{
//valor debes enviarle  con una  cadena  de texto
        return "Call $procedimiento($valor);";
}